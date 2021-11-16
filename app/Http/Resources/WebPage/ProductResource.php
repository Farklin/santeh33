<?php

namespace App\Http\Resources\WebPage;

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
            'id' => $this->id,
            'title' => $this->page->title,
            'content' => $this->page->content,
            'price' => $this->price,
            'old_price' => $this->old_price,
            'article' => $this->article, 
        ];
    }
}
