<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\WebPage\Category; 
use App\Models\WebPage\Page; 
use Illuminate\Support\Str;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;

ini_set('memory_limit','2048M');
ini_set('max_execution_time', 3000);

class CategoryImport implements ToCollection, WithChunkReading, ShouldQueue, WithHeadingRow
{

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {   
            $page = new Page();
            $page->id = $row['id']; 
            $page->title = $row['title'];
            $page->content = $row['content'];
            $page->seo_title = $row['seo_title'];
            $page->seo_description = $row['seo_description'];
            $page->seo_keywords = $row['seo_keywords'];
            $page->url = Str::slug($page->title); 
            $page->save(); 

            $category = new Category();
            $category->id = $row['id'];
            $category->category_id = $row['parent'];
            $category->save(); 
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