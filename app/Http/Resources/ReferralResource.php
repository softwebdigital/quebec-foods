<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class ReferralResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        $data = parent::toArray($request);
        Arr::set($data, 'amount_earned', number_format($this['amount'], 2, '.', ''));
        Arr::set($data, 'paid', (bool) $this['paid']);
        Arr::set($data, 'user', new UserResource($this->referred));
        Arr::set($data, 'created_at', date('Y-m-d H:i:s', strtotime($this['created_at'])));
        unset($data['referee_id'], $data['referred_id'], $data['amount'], $data['updated_at']);
        return $data;
    }
}
