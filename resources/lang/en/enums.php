<?php

declare(strict_types=1);

use App\Enums\ContactUs\ContactUsStatusEnum;

return [
    ContactUsStatusEnum::class => [
        ContactUsStatusEnum::NEW => 'NEW',
        ContactUsStatusEnum::READ => 'READ',
        ContactUsStatusEnum::REPLIED => 'REPLIED',
        ContactUsStatusEnum::IGNORED => 'IGNORED',
    ]

];
