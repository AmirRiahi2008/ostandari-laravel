<?php

namespace App\Services;

final class RetiredSections
{
    public static function path(string $path): bool
    {
        return in_array('/'.trim(rawurldecode(parse_url($path, PHP_URL_PATH) ?: '/'), '/'), ['/about/general', '/section/menu-5'], true);
    }

    public static function entry(array $entry): bool
    {
        if (($entry['id'] ?? '') === 'menu-5' || trim($entry['title'] ?? '') === 'اطلاعات عمومی') return true;
        $href = $entry['href'] ?? $entry['url'] ?? '';
        if (self::path($href)) return true;
        $path = parse_url($href, PHP_URL_PATH) ?: '/';
        if (self::path(preg_replace('~^/[^/]+(?=/)~', '', $path))) return true;
        parse_str(parse_url($href, PHP_URL_QUERY) ?? '', $query);
        return in_array(parse_url($href, PHP_URL_HOST), ['ostan-mz.ir', 'www.ostan-mz.ir'], true) && (string) ($query['MenuId'] ?? '') === '5';
    }

    public static function entries(array $entries): array
    {
        $result = [];
        foreach ($entries as $entry) {
            if (self::entry($entry)) continue;
            if (isset($entry['children'])) $entry['children'] = is_array($entry['children'][0] ?? null)
                ? self::entries($entry['children']) : array_values(array_filter($entry['children'], fn($id)=>$id!=='menu-5'));
            $result[] = $entry;
        }
        return $result;
    }
}
