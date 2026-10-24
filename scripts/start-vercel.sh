#!/bin/sh
# Run only the new additive migration, never legacy schema replacements or seeds.
php artisan portal:prepare-events --no-interaction || echo 'Event alerts are not ready; the public portal will continue to start.' >&2
exec frankenphp run --config /etc/frankenphp/Caddyfile
