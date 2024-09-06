<?php

namespace App\Http\Resources\Customer;

use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'birth_date' => $this->birth_date,
            'phone' => $this->phone,
            'gender' => $this->gender,
            'is_phone_verified' => $this->is_phone_verified,
            'is_email_verified' => $this->is_email_verified,
            'has_completed_profile' => $this->has_completed_profile,
            'token' => $this['tokenResult']->accessToken,
            'token_type' => 'Bearer',
        ];
    }
}
