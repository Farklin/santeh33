<?php

namespace App\Http\Resources\WebPage;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\WebPage\CategoryCollection; 
class CategoryResource extends JsonResource
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
            'child' =>  new CategoryCollection($this->children), 
        ];
    }
}
