#!/bin/sh
# Run additive setup commands, never legacy schema replacements or full seeds.
php artisan portal:prepare-events --no-interaction || echo 'Event alerts are not ready; the public portal will continue to start.' >&2
php artisan portal:import-member-directory --no-interaction || echo 'Member directory import was not completed; existing portal data was preserved.' >&2
exec frankenphp run --config /etc/frankenphp/Caddyfile
