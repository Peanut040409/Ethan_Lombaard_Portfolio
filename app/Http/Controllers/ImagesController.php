<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    public function index(Request $request){
        $images = Image::all();  
        return view('admin.images.index', ['images' => $images]);
    }
    public function store(Request $request){
        
    }
    public function destroy(Request $request, $id){
        
    }
    public function update(Request $request, $id){
        
    }
}
