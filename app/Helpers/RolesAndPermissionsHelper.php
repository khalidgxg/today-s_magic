<?php

use App\Enums\Admin\Roles\RoleTypesEnum;
use App\Models\Permission;

function getSystemRoles()
{
    return RoleTypesEnum::getValues();
}

function getCustomerRoles()
{
    return ['customer'];
}

function getSystemPermissions()
{
    return [
        'coaches' => ['show_coaches', 'modify_coach'],
        'customers' => ['show_customers', 'modify_customer'],
        'users' => ['show_users', 'modify_user'],
        'sessions' => ['show_sessions', 'modify_session'],
        'orders' => ['show_orders', 'modify_order'],
        'payouts' => ['show_payouts', 'modify_payout'],
        'wallets' => ['show_wallets', 'modify_wallet'],
        'transactions' => ['show_transactions'],
        'rates' => ['show_rates'],
        'coach_levels' => ['show_coach_levels', 'modify_coach_level'],
        'coach_categories' => ['show_coach_categories', 'modify_coach_category'],
        'faq_categories' => ['show_faq_categories', 'modify_faq_category'],
        'faqs' => ['show_faqs', 'modify_faq'],
        'discounts' => ['show_discounts', 'modify_discount'],
        'cancel_reasons' => ['show_cancel_reasons', 'modify_cancel_reason'],
        'pages' => ['show_pages'],
        'contact_us' => ['show_contact_us', 'modify_contact_us'],
        'contact_us_reasons' => ['show_contact_us_reasons', 'modify_contact_us_reason'],
        'warnings' => ['show_customer_warnings', 'modify_customer_warning','show_coach_warnings', 'modify_coach_warning','show_reviewed_warnings'],
        'settings' => ['show_settings', 'modify_setting'],
        'sessions_settings' => ['show_sessions_settings', 'modify_session_setting'],
        'professional_data_settings' => ['show_professional_data_settings', 'modify_professional_data_setting'],
        'permissions' => ['show_permissions', 'modify_permission'],
    ];
}

function mapPermissions($role = null)
{

    $permissions = isset($role) ? $role->permissions->pluck('name')->toArray() : [];
    $all_permissions = Permission::with('children:id,name,parent_id')->whereParentId(0)->select('id', 'name')->get();
    $new_permissions = collect();
    $all_permissions->map(function ($permission) use ($permissions, &$new_permissions) {

        $permission['name_ar'] = __('permissions.' . $permission->name);
        $permission['collection'] = getCollectionTranslate($permission->name);
        $new_permissions->push($permission);
        mapPermissionChildren($permission->children, $new_permissions, $permissions);

    });
    return $new_permissions->groupBy('collection')->map(function ($items) {
        return $items->map(function ($item) {
            return Arr::except($item, 'collection');
        });
    });
}

function mapPermissionChildren($children_permissions, &$new_permissions, $role_permissions)
{
    if ($children_permissions->count() > 0) {
        foreach ($children_permissions as $permission) {
            $children = $permission->children ?? collect();
            $permission['name_ar'] = __('permissions.' . $permission->name);
            $permission['is_active'] = in_array($permission->name, $role_permissions);
            mapPermissionChildren($children, $new_permissions, $role_permissions);
        }
    }
}

function getCollectionTranslate($permission_name)
{
    switch ($permission_name) {
        case 'users':
        case 'customers':
        case 'coaches':
            return 'المستخدمين';
        case 'faqs':
        case 'faq_categories':
            return 'الأسئلة الشائعة';
        case 'contact_us':
        case 'contact_us_reasons':
            return 'تواصل معنا';
        default:
            return __('permissions.' . $permission_name);

    }

}

function extractPermissionsIds($children_permissions, &$rearange_permissions)
{
    if ($children_permissions->count() > 0) {
        foreach ($children_permissions as $permission) {
            $children = $permission->children ?? collect();
            $rearange_permissions[] = $permission->id;
            extractPermissionsIds($children, $rearange_permissions);
        }
    }

}
