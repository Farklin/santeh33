<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Link\LinkCategoryProduct; 
use App\Models\WebPage\Page; 
use App\Models\WebPage\Category; 
use App\Models\WebPage\Product; 
use Illuminate\Support\Str;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;

ini_set('memory_limit','2048M');
ini_set('max_execution_time', 3000);

class LinkCategoryProductImport implements ToCollection, WithChunkReading, ShouldQueue, WithHeadingRow
{

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {   
            try{
                $link = new LinkCategoryProduct(); 
                $link->product_id = $row['product_id'];
                $link->category_id = $row['category_id'];
                $link->save(); 
            }catch (\Illuminate\Database\QueryException $e) {
                report($e);
        
                return false;
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