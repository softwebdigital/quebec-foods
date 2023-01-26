<?php

namespace App\Http\Resources;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class PackageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        $package = Package::find($this['id']);
        $data =  parent::toArray($request);
        Arr::set($data, 'slots', $this['slots'] == -1 ? 'unlimited' : $this['slots']);
        Arr::set($data, 'expected_returns', $this['expected_returns'] ?? $package['expected_returns']);
        Arr::set($data, 'total_investments', $this['total_investments'] ?? $package['total_investments']);
        Arr::set($data, 'duration', $this['new_duration'] ?? $package['new_duration']);
        Arr::set($data, 'duration_mode', $this['new_duration_mode'] ?? $package['new_duration_mode']);
        Arr::set($data, 'rollover', (bool) $this['rollover']);
        Arr::set($data, 'image', asset($this['image']));
        Arr::set($data, 'start_date', date('Y-m-d H:i:s', strtotime($this['start_date'])));
        Arr::set($data, 'created_at', date('Y-m-d H:i:s', strtotime($this['created_at'])));
        unset($data['updated_at'], $data['category_id'], $data['months']);
        return $data;
    }
}
