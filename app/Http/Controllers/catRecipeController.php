<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\catRecipe;
use Illuminate\Http\Request;

class catRecipeController extends Controller
{
    public function index(){
        return view('admin.categoriesform.recipe');
    }
    public function store(Request $request){
        $categories = catRecipe::create([
            'nama_catRecipe' => $request->categories
        ]);
        return redirect()->intended('admin/recipe');

    }
}
