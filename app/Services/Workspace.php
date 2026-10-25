<?php

namespace App\Services;

use App\Models\User;
use App\Support\CountySlugs;

final class Workspace
{
    public const PUBLIC_RELATIONS_PERMISSIONS = ['dashboard.view', 'content.manage', 'categories.manage', 'navigation.manage', 'media.manage', 'organizations.manage', 'members.manage', 'services.manage', 'tickets.manage', 'forms.manage', 'polls.manage', 'comments.manage', 'forum.manage', 'audit.view'];

    public static function assertUser(User $user): void
    {
        if ($user->hasGlobalAccess()) return;
        $organization = $user->organization;
        abort_unless($organization && $organization->is_active, 403, 'حساب مدیریت باید به یک سازمان فعال متصل باشد.');
        if ($organization->type === 'county') {
            abort_unless($organization->county?->is_active, 403, 'فرمانداری به شهرستان فعال متصل نیست.');
        }
        if ($user->role?->name === 'county_public_relations') {
            abort_unless($organization->type === 'county', 403, 'این نقش فقط برای فرمانداری قابل استفاده است.');
        }
        if ($user->role?->name === 'province_public_relations') {
            abort_unless($organization->type === 'governorate', 403, 'این نقش فقط برای استانداری قابل استفاده است.');
        }
    }

    public static function assertCounty(User $user, ?string $slug = null): void
    {
        self::assertUser($user);
        $context = self::context($user);
        abort_unless($user->is_active && $user->isStaff() && $user->isPublicRelations() && $context['type'] === 'county', 403,
            'این پنل فقط برای روابط عمومی همان فرمانداری است.');
        if ($slug !== null) {
            abort_unless(in_array($context['county']['slug'], CountySlugs::variants($slug), true), 403,
                'حساب شما به فرمانداری انتخاب‌شده دسترسی ندارد.');
        }
    }

    /** A narrow exception to the provincial PR read-only workspace. */
    public static function mayManageAnnualSlogan(User $user): bool
    {
        return $user->is_active && $user->isStaff() && (
            ($user->hasGlobalAccess() && $user->hasPermission('settings.manage')) ||
            ($user->hasReadOnlyWorkspace() && $user->hasPermission('media.manage'))
        );
    }

    public static function context(User $user): array
    {
        if ($user->person_type === 'citizen') {
            return ['type' => 'citizen', 'organization_id' => null, 'organization_name' => null, 'county' => null,
                'can_write' => false, 'is_global' => false, 'dashboard_path' => '/citizen', 'login_path' => '/login', 'public_path' => '/'];
        }
        $organization = $user->organization;
        $county = ! $user->hasGlobalAccess() && $organization?->type === 'county' ? $organization->county : null;
        $slug = $county ? CountySlugs::variants($county->slug)[0] : null;
        return [
            'type' => $county ? 'county' : ($user->hasGlobalAccess() ? 'central' : 'province'),
            'organization_id' => $organization?->id, 'organization_name' => $organization?->name,
            'county' => $county ? ['id' => $county->id, 'name' => $county->name, 'slug' => $slug] : null,
            'can_manage_annual_slogan' => self::mayManageAnnualSlogan($user),
            'can_write' => ! $user->hasReadOnlyWorkspace(), 'is_global' => $user->hasGlobalAccess(),
            'dashboard_path' => $slug ? '/county-admin/'.$slug : '/panel/admin',
            'login_path' => $slug ? '/county-admin/'.$slug.'/login' : '/panel/admin/login',
            'public_path' => $slug ? '/'.$slug : '/',
        ];
    }

    public static function user(User $user): array
    {
        $data = $user->load('role', 'organization.county')->toArray();
        if (isset($data['role'])) $data['role']['permissions'] = $user->effectivePermissions();
        $data['portal_context'] = self::context($user);
        return $data;
    }
}
