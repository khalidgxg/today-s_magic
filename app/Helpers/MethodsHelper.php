<?php

use App\Enums\Wallet\WalletHolderTypesFiltersEnum;
use App\Models\Coach;
use App\Models\Country;
use App\Models\Customer;
use App\Models\System;
use App\Settings\TaxSettings;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

function createAt($date)
{
    return Carbon::create($date)->format('Y-m-d H:i:s');
}

function updateAt($date)
{
    return Carbon::create($date)->format('Y-m-d H:i:s');
}

if (!function_exists('isProductionEnv')) {
    function isProductionEnv(): bool
    {
        return config('app.env') === 'production';
    }
}

function generateRandomPassword($length = 10)
{
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
    $password = '';

    // Ensure at least one character from each category
    $password .= getRandomCharacter('abcdefghijklmnopqrstuvwxyz');
    $password .= getRandomCharacter('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
    $password .= getRandomCharacter('0123456789');
    $password .= getRandomCharacter('!@#$%^&*()');

    // Generate the remaining characters
    for ($i = 0; $i < $length - 4; $i++) {
        $password .= $chars[rand(0, strlen($chars) - 1)];
    }

    // Shuffle the password to ensure randomness
    $password = str_shuffle($password);

    return $password;
}

function getRandomCharacter($characters)
{
    return $characters[rand(0, strlen($characters) - 1)];
}

function categories()
{
    return [
        [
            'id' => uuid_create(),
            'name' => 'استشارة تربوية',
            'description' => 'وصف استشارة تربوية',
            'priority' => rand(1, 10),
            'status' => true,
            'created_at' => Carbon::now()->subSeconds(random_int(1, 60)),
            'updated_at' => Carbon::now()->subSeconds(random_int(1, 60)),
        ],
        [
            'id' => uuid_create(),
            'name' => 'استشارة أعمال',
            'description' => 'وصف استشارة أعمال',
            'priority' => rand(1, 10),
            'status' => true,
            'created_at' => Carbon::now()->subSeconds(random_int(1, 60)),
            'updated_at' => Carbon::now()->subSeconds(random_int(1, 60)),
        ],
        [
            'id' => uuid_create(),
            'name' => 'استشارة مال',
            'description' => 'وصف استشارة مال',
            'priority' => rand(1, 10),
            'status' => true,
            'created_at' => Carbon::now()->subSeconds(random_int(1, 60)),
            'updated_at' => Carbon::now()->subSeconds(random_int(1, 60)),
        ],
        [
            'id' => uuid_create(),
            'name' => 'استشارة طبية',
            'description' => 'وصف استشارة طبية',
            'priority' => rand(1, 10),
            'status' => false,
            'created_at' => Carbon::now()->subSeconds(random_int(1, 60)),
            'updated_at' => Carbon::now()->subSeconds(random_int(1, 60)),
        ],
        [
            'id' => uuid_create(),
            'name' => 'استشارة حرة',
            'description' => 'وصف استشارة حرة',
            'priority' => rand(1, 10),
            'status' => true,
            'created_at' => Carbon::now()->subSeconds(random_int(1, 60)),
            'updated_at' => Carbon::now()->subSeconds(random_int(1, 60)),
        ],
    ];
}

function languages()
{
    return [
        [
            'id' => uuid_create(),
            'name' => 'العربية',
            'created_at' => Carbon::now()->subSeconds(random_int(1, 60)),
            'updated_at' => Carbon::now()->subSeconds(random_int(1, 60)),
        ],
        [
            'id' => uuid_create(),
            'name' => 'الانجليزية',
            'created_at' => Carbon::now()->subSeconds(random_int(1, 60)),
            'updated_at' => Carbon::now()->subSeconds(random_int(1, 60)),
        ],
        [
            'id' => uuid_create(),
            'name' => 'الفرنسية',
            'created_at' => Carbon::now()->subSeconds(random_int(1, 60)),
            'updated_at' => Carbon::now()->subSeconds(random_int(1, 60)),
        ],
    ];
}

function qualifications()
{
    return [
        [
            'id' => uuid_create(),
            'qualified' => 'شهادة جامعية',
            'created_at' => Carbon::now()->subSeconds(random_int(1, 60)),
            'updated_at' => Carbon::now()->subSeconds(random_int(1, 60)),
        ],
        [
            'id' => uuid_create(),
            'qualified' => 'شهادة دبلوم',
            'created_at' => Carbon::now()->subSeconds(random_int(1, 60)),
            'updated_at' => Carbon::now()->subSeconds(random_int(1, 60)),
        ],
        [
            'id' => uuid_create(),
            'qualified' => 'دورة تدريبية',
            'created_at' => Carbon::now()->subSeconds(random_int(1, 60)),
            'updated_at' => Carbon::now()->subSeconds(random_int(1, 60)),
        ],
        [
            'id' => uuid_create(),
            'name' => 'شهادة لايف كوتش',
            'created_at' => Carbon::now()->subSeconds(random_int(1, 60)),
            'updated_at' => Carbon::now()->subSeconds(random_int(1, 60)),
        ],
    ];
}

function degrees()
{
    return [
        [
            'id' => uuid_create(),
            'degree' => 'دبلوم',
            'created_at' => Carbon::now()->subSeconds(random_int(1, 60)),
            'updated_at' => Carbon::now()->subSeconds(random_int(1, 60)),
        ],
        [
            'id' => uuid_create(),
            'degree' => 'بكالوريوس',
            'created_at' => Carbon::now()->subSeconds(random_int(1, 60)),
            'updated_at' => Carbon::now()->subSeconds(random_int(1, 60)),
        ],
        [
            'id' => uuid_create(),
            'degree' => 'ماجستير',
            'created_at' => Carbon::now()->subSeconds(random_int(1, 60)),
            'updated_at' => Carbon::now()->subSeconds(random_int(1, 60)),
        ],
        [
            'id' => uuid_create(),
            'degree' => 'دراسات عليا',
            'created_at' => Carbon::now()->subSeconds(random_int(1, 60)),
            'updated_at' => Carbon::now()->subSeconds(random_int(1, 60)),
        ],
    ];
}

function convertKeysToSnakeCase($data)
{
    $snake_case_data = [];
    if ($data) {
        foreach ($data as $key => $value) {
            $snake_case_key = $key;

            if (is_array($value)) {
                $value = convertKeysToSnakeCase($value);
            }

            if (is_string($key) && preg_match('/^[a-z]+(?:[A-Z][a-z]+)*$/', $key)) {
                $snake_case_key = Str::snake($key);
            }

            $snake_case_data[$snake_case_key] = $value;
        }
    }

    return $snake_case_data;
}

function convertKeysToCamelCase($data)
{
    //dd($data['users'][0]->resolve());
    $camel_case_data = [];
    if ($data) {
        $data = match (true) {
            $data instanceof JsonResource => $data->resolve(),
            $data instanceof Model => $data->toArray(),
            is_array($data) => $data,
            $data instanceof Collection => $data->toArray(),
            default => (array)$data,
        };

        foreach ($data as $key => $value) {

            $camel_case_key = $key;
            if (is_array($value) or $value instanceof JsonResource or $value instanceof Model or $value instanceof Collection) {
                $value = convertKeysToCamelCase($value);
            }

            if (is_string($key) && preg_match('/^[a-z0-9]+(?:_[a-z0-9]+)*(\.[a-z0-9]+)?$/i', $key)) {
                $camel_case_key = Str::camel($key);
            }

            $camel_case_data[$camel_case_key] = $value;
        }
    }

    return $camel_case_data;
}

function readableInt(int $n)
{
    $formats = [
        1000 => 'K',
        1000000 => 'M',
        1000000000 => 'B',
        1000000000000 => 'T',
    ];

    foreach ($formats as $limit => $format) {
        if ($n > $limit) {
            return round(($n / $limit), 1) . $format;
        }
    }

    return number_format($n);
}

function unsetEmptyParams(Request $request)
{
    foreach ($request->all() as $key => $value) {
        if ($value === 0 || $value === '0') {
            continue;
        } elseif (empty($value) || $value == null) {
            unset($request[$key]);
        }
    }
}

function unsetEmptyParamsFromArray(array $array)
{
    foreach ($array as $key => $value) {

        if (!isset($value)) {
            unset($array[$key]);
        }
    }

    return $array;
}


function is_empty(array $array): bool
{
    return sizeof($array) === 0;
}

function reOrderIndex(array|object $array)
{
    $newArray = [];

    foreach ($array as $key => $value) {
        $newArray[] = $value;
    }

    return $newArray;
}

function resolveIndexResponse($collection, $newIndexName, $oldIndexName = 'data')
{
    $collection[$newIndexName] = $collection[$oldIndexName];

    unset($collection[$oldIndexName]);

    return $collection;
}

function generateOtp(): int
{
    return random_int(100000, 999999);
}

function removeTags(string $string)
{
    $text = preg_replace('/<[^>]*>/', '', $string); // remove tabs
    $text = preg_replace('/[^\p{L}\p{N}\s]/u', '', $text);  // remove symbols
    $text = preg_replace("/\r|\n/", ' ', $text); // remove newline (\n\r)
    $text = str_replace('nbsp', '', $text); // remove nbsp

    return $text;
}

function sendVerificationPhoneCode($user, $phone, $notification)
{
    $user->verifyPhone()->delete();

    $verifyPhone = $user->generatePhoneVerificationCode($phone);

    Mail::to($user->email)->send($notification);

    return $verifyPhone;
}

function getWalletHolderType(string $holder_type)
{
    switch ($holder_type) {
        case Customer::class:
            {
                return WalletHolderTypesFiltersEnum::CUSTOMER;
            }
        case Coach::class:
            {
                return WalletHolderTypesFiltersEnum::COACH;
            }
        case System::class:
            {
                return WalletHolderTypesFiltersEnum::SYSTEM;
            }
    }
}

function getAllPathsFromMedia($files)
{
    return collect($files)->map(fn ($file) => $file->getPath());
}

function isTaxed($customer_id = null): bool
{
    $taxable_country_id = Country::Taxable()->value('id');

    if ($customer_id) {

        $customer = Customer::find($customer_id);
        return $customer && $customer->country_id === $taxable_country_id;
    }

    if (Auth::check()) {
        $customer = Auth::user();
        return $customer && $customer->country_id === $taxable_country_id;
    }

    return false;

}

function getTax($customer_id = null)
{

    if (isTaxed($customer_id) and app(TaxSettings::class)->is_tax_apply_in_ksa) {

        return app(TaxSettings::class)->tax_percentage / 100;
    }

    return 0;
}

function getOrientationCategory()
{
    return \App\Models\CoachCategory::where('name', \App\Models\CoachCategory::ORIENTATION_SESSION_NAME)->first();
}
