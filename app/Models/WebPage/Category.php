<?php

namespace App\Models\WebPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\WebPage\CategoryCollection; 
use App\Http\Resources\WebPage\ProductCollection; 

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
        return $this->hasMany(Category::class, 'category_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, "link_category_product", 'category_id', 'product_id');
    }

    /**
     * Сохранение в кеше продуктов данной категории 
     *
     * @param [type] $id
     * @return void
     */
    public static function getCacheProducts($id)
    {   
        $seconds = 600;
        $products = Cache::remember('category_' . $id, $seconds,  
            function() use($id) 
            {
                return new ProductCollection(Category::find($id)->products()->paginate());
            }
        ); 
        return $products; 
    }
}
