<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'title' => $this->title,
            'entry' => $this->entry,
            'description' => $this->description,
            'slug' => $this->slug,
            'img' => $this->img,
            'thumb' => $this->thumb,
            'active' => $this->active,
            'seo_title' => $this->seo_title,
            'seo_desc' => $this->seo_desc,
            'home' => $this->home,
            'time' => $this->updated_at->diffForHumans(),
            'tags' => $this->whenLoaded('tags'),
            'category' => $this->whenLoaded('category'),
        ];
    }
}
