<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\WebPage\Product; 
use App\Models\Image\Image; 
use App\Models\Image\ProductImage; 
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;

ini_set('memory_limit','2048M');
ini_set('max_execution_time', 3000);

class ProductImageImport implements ToCollection, WithChunkReading, ShouldQueue, WithHeadingRow
{

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {   
            try{
                if(Product::where('id', $row['product_id'])->exists())
                {
                    $image = new Image();
                    $image->path = $row['path'];
                    $image->preview = $row['preview'];
                    $image->sorting = $row['sorting'];
                    $image->save();

                    $productImage = new ProductImage();
                    $productImage->image_id = $image->id; 
                    $productImage->product_id = $row['product_id'];
                    $productImage->save(); 
                }
            }catch (\Illuminate\Database\QueryException $e) {      
            
            }
        }
    }

    public function startRow(): int 
    {
         return 1;
    }

    public function batchSize(): int
    {
        return 200;
    }

    public function chunkSize(): int
    {
        return 200;
    }

   
}