<?php

namespace App\Http\Resources;

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
        $data =  parent::toArray($request);
        Arr::set($data, 'rollover', (bool) $this['rollover']);
        Arr::set($data, 'image', asset($this['image']));
        Arr::set($data, 'start_date', date('Y-m-d H:i:s', strtotime($this['start_date'])));
        Arr::set($data, 'created_at', date('Y-m-d H:i:s', strtotime($this['created_at'])));
        unset($data['updated_at'], $data['category_id']);
        return $data;
    }
}
