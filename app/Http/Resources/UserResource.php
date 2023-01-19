<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     **
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        $data = parent::toArray($request);
        Arr::set($data, 'ref_code', (string) $this['ref_code']);
        Arr::set($data, 'ref_code_link', route('register').'?ref='.$this['ref_code']);
        Arr::set($data, 'email_verified', $this['email_verified_at'] != null);
        Arr::set($data, 'two_factor_enabled', (bool) $this['two_factor_enabled']);
        Arr::set($data, 'active', (bool) $this['active']);
        Arr::set($data, 'avatar', $this['avatar'] ? asset($this['avatar']) : null);
        Arr::set($data, 'created_at', date('Y-m-d H:i:s', strtotime($this['created_at'])));
        unset(
            $data['updated_at'], $data['email_verified_at'], $data['transaction_pin'], $data['gotMail'], $data['otp'],
            $data['otp_expiry'], $data['reset_otp'], $data['reset_otp_expiry'], $data['two_factor_code'],
            $data['two_factor_expires_at'], $data['withdrawal_otp'], $data['withdrawal_otp_expiry']
        );
        return $data;
    }
}
