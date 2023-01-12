<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class DocumentResource extends JsonResource
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
        Arr::set($data, 'path', asset($this['photo']));
        Arr::set($data, 'created_at', date('Y-m-d H:i:s', strtotime($this['created_at'])));
        unset($data['user_id'], $data['photo'], $data['updated_at']);
        return $data;
    }
}
