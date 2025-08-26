<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class AdminController extends Controller
{
    public function dashboard() {
        $postCount = Cache::remember('post_count', 600, function() {
            return Post::count();
        });

        

        $databaseName = env('DB_DATABASE');
        $size = Cache::remember('database_size', 600, function() use ($databaseName) {
            return DB::select("
                    SELECT ROUND(SUM(data_length + index_length) / 1024 / 1024, 2) AS size_mb
                    FROM information_schema.tables
                    WHERE table_schema = ?
                ", [$databaseName]);
        });

        $sizeInMb = $size[0]->size_mb ?? 0;

        
        $quoteFormatted = Cache::remember('quote_of_the_day', 600, function() {
            $quoteResponse = Http::get("https://zenquotes.io/api/random");
            $quoteJson = $quoteResponse->successful() 
                ? $quoteResponse->json()       
                : [[
                    "q" => "It always seems impossible until it's done.",
                    "a" => "Nelson Mandela"
                ]];               

            return '"' . $quoteJson[0]['q'] . '" - ' . $quoteJson[0]['a'];
        });

        return view('admin_dashboard', [
            'databaseSize' => $sizeInMb . "mb", 
            'postCount' => $postCount, 
            'quote' => $quoteFormatted
        ]);
    }
}
