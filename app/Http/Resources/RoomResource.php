<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Number;

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
            'description' => $this->description,
            'thumb' => $this->thumb,
            'img' => $this->img,
            'entry' => $this->entry,
            'adults' => $this->adults,
            'price' => $this->price,
            'price_format' => $this->price,
            // 'bed' => $this->bed,
            'beds' => BedResource::collection($this->whenLoaded('beds')),
            'images' => $this->whenLoaded('images'),
            'amenities' => $this->whenLoaded('amenities'),
            'offer' => $this->offer,
            'charge' => $this->charge
        ];
    }
}
