<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'category'=>[
                'id'=>$this->category->id,
                'name'=>$this->category->name
            ],
            'available_qty' => $this->available_qty,
            'store' => [
                'id'=>$this->store ->id,
                'name'=>$this->store ->name
            ],
            'price' => $this->price,
            'image' => $this->image,
            'description' => $this->description,
            'status' => $this->status,
            'created_at' => $this->created_at,

        ];
    }
}
