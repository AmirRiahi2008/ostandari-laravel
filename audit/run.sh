#!/usr/bin/env bash
set -euo pipefail
mkdir -p audit-results
chmod 777 audit-results
getconf _NPROCESSORS_ONLN > audit-results/runner-cpus.txt
cat /proc/meminfo > audit-results/runner-memory.txt
docker build -f Dockerfile.vercel -t ostandari-load:audit . > audit-results/docker-build.log 2>&1
ENV_ARGS=(-e APP_ENV=production -e APP_DEBUG=false -e APP_URL=http://127.0.0.1:8080 -e APP_KEY=base64:VEVTVF9PTkxZX0tFWV8wMTIzNDU2Nzg5MDEyMzQ1Njc= -e DB_CONNECTION=mysql -e DB_HOST=127.0.0.1 -e DB_PORT=3306 -e DB_DATABASE=ostandari_load_testing -e DB_USERNAME=root -e DB_PASSWORD=disposable-load-password -e CACHE_STORE=file -e SESSION_DRIVER=cookie -e SESSION_SECURE_COOKIE=false -e QUEUE_CONNECTION=sync -e OTP_DRIVER=log -e OTP_EXPOSE_LOCAL=false -e EVENT_SMS_DRIVER=log -e MAIL_MAILER=log -e CITIZEN_DEMO=false -e PORTAL_SNAPSHOT=false -e PORT=8080)
docker run -d --name ostandari-fixture --network host --entrypoint sleep "${ENV_ARGS[@]}" ostandari-load:audit 900 >/dev/null
docker cp audit/seed.php ostandari-fixture:/tmp/seed.php
docker cp audit/profile.php ostandari-fixture:/tmp/profile.php
docker exec ostandari-fixture php -d memory_limit=512M /tmp/seed.php > audit-results/seed.log 2>&1
docker cp ostandari-fixture:/tmp/load-fixtures.json audit-results/load-fixtures.json
docker cp ostandari-fixture:/tmp/load-meta.json audit-results/load-meta.json
docker cp ostandari-fixture:/tmp/load-image.jpg audit-results/load-image.jpg
docker exec ostandari-fixture php /tmp/profile.php > audit-results/profile.log 2>&1
docker cp ostandari-fixture:/tmp/query-profile.json audit-results/query-profile.json
docker rm -f ostandari-fixture >/dev/null
# Same production image and Caddy directives, bound only to local loopback for testing.
sed '1s/^:.* {/http:\/\/127.0.0.1:8080 {/' Caddyfile > audit-results/Caddyfile
date -u +%FT%TZ > audit-results/app-started.txt
docker run -d --name ostandari-app --network host --cpus=2 --memory=2g "${ENV_ARGS[@]}" -v "$PWD/audit-results/Caddyfile:/etc/frankenphp/Caddyfile:ro" ostandari-load:audit >/dev/null
cleanup(){ docker logs ostandari-app > audit-results/app.log 2>&1 || true; docker inspect ostandari-app --format '{{json .State}}' > audit-results/app-state.json || true; docker rm -f ostandari-app >/dev/null 2>&1 || true; rm -f audit-results/load-fixtures.json; }
trap cleanup EXIT
for i in {1..60}; do if curl -sf http://127.0.0.1:8080/up >/dev/null; then break; fi; sleep 1; done
curl -sf http://127.0.0.1:8080/api/v1/health > audit-results/health.json
python3 audit/smoke.py
docker pull grafana/k6:2.3.0 > audit-results/k6-image.log 2>&1
docker image inspect grafana/k6:2.3.0 --format '{{json .RepoDigests}}' > audit-results/k6-digest.json
(
 while docker inspect ostandari-app >/dev/null 2>&1; do date -u +%FT%TZ; docker stats --no-stream --format '{{json .}}' ostandari-app $(docker ps -q --filter ancestor=grafana/k6:2.3.0); sleep 3; done
) > audit-results/container-stats.jsonl 2>&1 &
monitor_pid=$!
if [[ "${AUDIT_SESSION_ONLY:-0}" != 1 ]]; then
for vu in 1 10 50 100 250 500 1000; do
 printf '{"mode":"mixed","vus":%s,"started":"%s"}\n' "$vu" "$(date -u +%FT%TZ)" >> audit-results/stages.jsonl
 docker exec ostandari-app php artisan cache:clear >/dev/null
 docker run --rm --network host --name "load-$vu" --memory=3g -e TARGET_VUS="$vu" -e MODE=mixed -v "$PWD/audit-results:/input:ro" -v "$PWD/audit-results:/output" -v "$PWD/audit/load.js:/load.js:ro" grafana/k6:2.3.0 run --quiet /load.js > "audit-results/mixed-$vu.log" 2>&1 || printf '%s\n' "$?" > "audit-results/mixed-$vu.exit"
done
modes='nat writes uploads sessions'
else
modes='sessions'
fi
for mode in $modes; do
 printf '{"mode":"%s","vus":20,"started":"%s"}\n' "$mode" "$(date -u +%FT%TZ)" >> audit-results/stages.jsonl
 docker exec ostandari-app php artisan cache:clear >/dev/null
 docker run --rm --network host --name "load-$mode" --memory=3g -e TARGET_VUS=20 -e MODE="$mode" -v "$PWD/audit-results:/input:ro" -v "$PWD/audit-results:/output" -v "$PWD/audit/load.js:/load.js:ro" grafana/k6:2.3.0 run --quiet /load.js > "audit-results/$mode-20.log" 2>&1 || printf '%s\n' "$?" > "audit-results/$mode-20.exit"
done
kill "$monitor_pid" || true
docker exec ostandari-app php artisan route:list --json > audit-results/routes.json
echo 'LOAD_AUDIT_COMPLETED'
