#!/bin/sh
# Run additive setup commands, never legacy schema replacements or full seeds.
php artisan portal:prepare-events --no-interaction || echo 'Event alerts are not ready; the public portal will continue to start.' >&2
(php artisan portal:import-service-agreements --no-interaction >&2 || echo 'Service-agreement import failed; all changes were rolled back.' >&2) &
(php artisan portal:prepare-pages --no-interaction >&2 || echo 'Custom-page setup did not complete; existing portal data was preserved.' >&2) &
# Importing 198 people and fetching the remote portrait must not delay the HTTP listener.
(printf '%s\n' 'Member directory import starting.' >&2; php artisan portal:import-member-directory --no-interaction >&2 || echo 'Member directory import was not completed; existing portal data was preserved.' >&2) &
exec frankenphp run --config /etc/frankenphp/Caddyfile
