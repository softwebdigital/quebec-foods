<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class NotificationResource extends JsonResource
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
        Arr::set($data, 'title', $this['data']['title']);
        Arr::set($data, 'body', $this['data']['body']);
        Arr::set($data, 'read', $this['read_at'] != null);
        Arr::set($data, 'date', date('d M,Y', strtotime($this['created_at'])));
        Arr::set($data, 'time', date('h:ia', strtotime($this['created_at'])));
        unset($data['updated_at'], $data['read_at'], $data['notifiable_type'], $data['notifiable_id'], $data['type'], $data['data']);
        return $data;
    }
}
