<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class InvestmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        $data =  parent::toArray($request);
        Arr::set($data, 'rollover', (bool) $this['rollover']);
        Arr::set($data, 'investment_date', date('Y-m-d H:i:s', strtotime($this['investment_date'])));
        Arr::set($data, 'payout_date', date('Y-m-d H:i:s', strtotime($this['return_date'])));
        Arr::set($data, 'start_date', date('Y-m-d H:i:s', strtotime($this['start_date'])));
        Arr::set($data, 'created_at', date('Y-m-d H:i:s', strtotime($this['created_at'])));
        Arr::set($data, 'package', new PackageResource(json_decode($this['package_data'], true)));
        Arr::set($data, 'milestones', TransactionResource::collection($this->transactions()->where('type', 'payout')->get()));
        unset($data['updated_at'], $data['category_id'], $data['user_id'], $data['package_data'], $data['package_id']);
        return $data;
    }
}
