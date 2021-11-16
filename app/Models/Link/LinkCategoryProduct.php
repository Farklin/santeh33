<?php

namespace App\Models\Link;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkCategoryProduct extends Model
{
    use HasFactory;

    protected $table = 'link_category_product'; 
    protected $fillable = array(
        'category_id',
        'product_id',
        // The rest of the column names that you want it to be mass-assignable.
    );
    
}
