<?php

return [
    'notification_template' => [
        'active_customers' => 'جميع المستخدمون النشطون',
        'some_customers' => 'بعض المستخدمين ',
        'special_course' => 'مشتركي دورة أسرار النجاح',
        'has_active_subscription' => 'جميع العملاء باشتراك ساري المفعول',
        'active_customers_this_month' => 'جميع العملاء النشطين 30 يوم الماضية',
    ],
    'name' => [
        \App\Models\User::class => 'الادمن',
        \App\Models\Country::class => 'الدولة',
        \App\Models\Customer::class => 'العميل',

    ]
];
