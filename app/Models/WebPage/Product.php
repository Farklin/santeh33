<?php

namespace App\Models\WebPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image\Image; 

class Product extends Model
{
    use HasFactory;

    public function page()
    {
        return $this->belongsTo(Page::class, 'id'); 
    }
    
    /**
     * Получить картинки товара
     *
     * @return void
     */
    public function images()
    {
        return $this->belongsToMany(Image::class, 'link_product_image', 'product_id', 'image_id'); 
    }
}
