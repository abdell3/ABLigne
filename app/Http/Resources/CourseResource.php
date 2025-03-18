<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' =>$this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'couverture' => $this->couverture,
            'langague' => $this->langague,
            'status' => $this->status,
            'difficulty_level' => $this->difficulty_level,
            'duration' => $this->duration,
            'category_id' => $this->category_id,
            'sub_category_id' => $this->sub_category_id
        ];
    }
}
