<?php

namespace App\Models\WebPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function page()
    {
        return $this->belongsTo(Page::class, 'id'); 
    }

    /**
     * Подчиненые категории
     *
     * @return void
     */
    public function children()
    {
        return $this->hasMany(Page::class, 'id'); 
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, "link_category_product", 'category_id', 'product_id' ); 
    }
}
