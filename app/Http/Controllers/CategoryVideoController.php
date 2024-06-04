<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CategoriesVideo;
use Illuminate\Http\Request;

class CategoryVideoController extends Controller
{
    public function index(){
        return view('admin.categoriesform.video');
    }
    public function store(Request $request){
        $categories = CategoriesVideo::create([
            'nama_categories_video' => $request->categories
        ]);
        return redirect()->intended('admin/video');

    }
}
