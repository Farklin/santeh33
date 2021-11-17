<?php


use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductImageImport;
use App\Imports\ProductImport;
use App\Imports\CategoryImport;
use App\Imports\LinkCategoryProductImport;
use App\Models\WebPage\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   // Excel::import(new CategoryImport, 'category.xlsx');
   // Excel::import(new ProductImport, 'products1.xlsx');
   // Excel::import(new LinkCategoryProductImport, 'link_product.xlsx');
   // Excel::import(new ProductImageImport, 'image_product.xlsx');
});
