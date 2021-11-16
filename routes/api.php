<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\WebPage\Product; 
use App\Models\WebPage\Category; 
use App\Http\Resources\WebPage\ProductCollection; 
use App\Http\Resources\WebPage\CategoryCollection; 
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/products', function (Request $request) {
    $products = Product::paginate();
    $product_api = new ProductCollection($products); 
    return $product_api->toJson();  
}); 


Route::get('/category', function (Request $request) {
    $category = Category::where('category_id', null)->get();
    $category_api = new CategoryCollection($category); 
    return $category_api->toJson();  
}); 


Route::get('/category/{id}', function (Request $request, $id) {
    $products = Category::find($id)->products; 
    $products_api = new ProductCollection($products); 
    return $products_api;  
}); 

