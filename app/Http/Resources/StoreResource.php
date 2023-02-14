<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StoreResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'email'=> $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'category_id' => $this->category_id,
            'description' => $this->description,
            'image' => $this->image,
            'cover_image' => $this->cover_image,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'category' => new CategoryResource($this->whenLoaded('category')),
        ];
    }
}
