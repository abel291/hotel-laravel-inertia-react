<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'thumb' => $this->thumb,
            'img' => $this->img,
            'entry' => $this->entry,
            'adults' => $this->adults,
            'price' => $this->price,
            'bed' => $this->bed,
            'beds' => BedResource::collection($this->whenLoaded('beds')),
        ];
    }
}
