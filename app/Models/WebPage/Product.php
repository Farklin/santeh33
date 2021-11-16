<?php

namespace App\Models\WebPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function page()
    {
        return $this->belongsTo(Page::class, 'id'); 
    }
}
