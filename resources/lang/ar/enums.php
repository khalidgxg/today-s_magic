<?php

declare(strict_types=1);

use App\Enums\Admin\ChangeCoachCategoryOrders\ChangeCoachCategoryOrderEnum;
use App\Enums\Admin\ChangeCoachLevelOrders\ChangeCoachLevelOrderEnum;
use App\Enums\Admin\faqCategories\FaqTypeEnum;
use App\Enums\Admin\PostponeSessionRequest\PostponeSessionRequestEnum;
use App\Enums\Admin\Roles\RoleTypesEnum;
use App\Enums\Coach\CoachAccountStatusEnum;
use App\Enums\Coach\CoachDegreesEnum;
use App\Enums\Coach\CoachLevelsTypeEnum;
use App\Enums\Coach\CoachPaymentTypesEnum;
use App\Enums\Coach\CoachQualificationsEnum;
use App\Enums\CoachPayout\CoachPayoutStatusEnum;
use App\Enums\ContactUs\ContactUsStatusEnum;
use App\Enums\Order\OrderPaymentMethodEnum;
use App\Enums\Order\OrderStatusEnum;
use App\Enums\Session\SessionStatusEnum;
use App\Enums\Session\SessionTypeEnum;
use App\Enums\TransactionTypesEnum;
use App\Enums\WalletHistoryOperationTypeEnum;

return [
    CoachQualificationsEnum::class => [
        CoachQualificationsEnum::COLLEGE_DEGREE => 'شهادة جامعية',
        CoachQualificationsEnum::DIPLOMA => 'شهادة دبلوم',
        CoachQualificationsEnum::TRAINING_COURSE => 'دورة تدريبية',
        CoachQualificationsEnum::LIFE_COACHING_CERTIFICATE => 'شهادة لايف كوتش',
    ],
    CoachDegreesEnum::class => [
        CoachDegreesEnum::DIPLOMA => 'دبلوم',
        CoachDegreesEnum::BACHELORS => 'بكالوريوس',
        CoachDegreesEnum::MASTERS => 'ماجستير',
        CoachDegreesEnum::GRADUATE_STUDIES => 'دراسات عليا',
    ],
    CoachAccountStatusEnum::class => [
        CoachAccountStatusEnum::PENDING => 'معلق',
        CoachAccountStatusEnum::UNDER_REVIEW => 'قيد المراجعة',
        CoachAccountStatusEnum::ACCEPTED => 'مقبول',
        CoachAccountStatusEnum::REJECTED => 'مرفوض',
    ],
    PostponeSessionRequestEnum::class => [
        PostponeSessionRequestEnum::PENDING => 'بأنتظار الرد',
        PostponeSessionRequestEnum::ACCEPT => 'مقبول',
        PostponeSessionRequestEnum::REJECT => 'مرفوض',
    ],
    FaqTypeEnum::class => [
        FaqTypeEnum::COACH => 'المستشار',
        FaqTypeEnum::CUSTOMER => 'العميل',
        FaqTypeEnum::BOTH => 'للكل',
    ],
    SessionTypeEnum::class => [
        SessionTypeEnum::SCHEDULED => 'مجدولة',
        SessionTypeEnum::DIRECT => 'مباشرة',
    ],
    ContactUsStatusEnum::class => [
        ContactUsStatusEnum::NEW => 'جديدة',
        ContactUsStatusEnum::READ => 'مقروءة',
        ContactUsStatusEnum::REPLIED => 'تم الرد',
        ContactUsStatusEnum::IGNORED => 'تجاهل',
    ],

    WalletHistoryOperationTypeEnum::class => [
        WalletHistoryOperationTypeEnum::WITHDRAWAL => 'سحب',
        WalletHistoryOperationTypeEnum::DEPOSIT => 'إيداع',
    ],
    RoleTypesEnum::class => [
        RoleTypesEnum::SUPER_ADMIN => 'ادمن',],
    OrderStatusEnum::class => [
        OrderStatusEnum::PENDING_PAYMENT => 'بإنتظار الدفع',
        OrderStatusEnum::CANCELLED => 'ملغي',
        OrderStatusEnum::COMPLETED => 'مكتمل',
        OrderStatusEnum::PROCESSING => 'قيد المعالجة',
        OrderStatusEnum::REFUNDED => 'مُسترجع',
        OrderStatusEnum::FAILED_PAYMENT => 'فشل الدفع',
    ],
    OrderPaymentMethodEnum::class => [
        OrderPaymentMethodEnum::CREDIT_CARD => 'البطاقة الائتمانية',
        OrderPaymentMethodEnum::WALLET => 'المحفظة',
    ],
    SessionStatusEnum::class => [
        SessionStatusEnum::SCHEDULED => 'مجدولة',
        SessionStatusEnum::IN_PROGRESS => 'قيد التنفيذ',
        SessionStatusEnum::COMPLETED => 'مكتملة',
        SessionStatusEnum::CANCELLED => 'مُلغاة',
        SessionStatusEnum::RESCHEDULED => 'مُعاد جدولتها',
    ],
    CoachLevelsTypeEnum::class => [
        CoachLevelsTypeEnum::SPECIAL => 'خاصة',
        CoachLevelsTypeEnum::SESSIONS => 'مرتبط بجلسة'
    ],
    CoachPaymentTypesEnum::class => [
        CoachPaymentTypesEnum::STC => 'stc',
        CoachPaymentTypesEnum::PAYPAL => 'باي بال',
    ],
    TransactionTypesEnum::class => [
        TransactionTypesEnum::DEPOSIT => 'دائن',
        TransactionTypesEnum::WITHDRAWAL => 'مدين',
        TransactionTypesEnum::INTERNAL => 'داخلي',
    ],
    ChangeCoachLevelOrderEnum::class => [
        ChangeCoachLevelOrderEnum::UNDER_REVIEW => 'قيد المراجعة',
        ChangeCoachLevelOrderEnum::ACCEPTED => 'مقبول',
        ChangeCoachLevelOrderEnum::REJECTED => 'مرفوض',
    ],
    ChangeCoachCategoryOrderEnum::class => [
        ChangeCoachCategoryOrderEnum::UNDER_REVIEW => 'قيد المراجعة',
        ChangeCoachCategoryOrderEnum::ACCEPTED => 'مقبول',
        ChangeCoachCategoryOrderEnum::REJECTED => 'مرفوض',
    ],
    CoachPayoutStatusEnum::class => [
        CoachPayoutStatusEnum::PENDING => 'قيد الانشاء',
        CoachPayoutStatusEnum::COMPLETED => 'تم التحويل',
        CoachPayoutStatusEnum::FAILED => 'فشل التحويل',
        CoachPayoutStatusEnum::REFUNDED => 'مسترجع',
        CoachPayoutStatusEnum::UNCLAIMED => 'غير مطالب بها بعد',
        CoachPayoutStatusEnum::PROCESSING => 'جاري التحويل',

    ]
];
