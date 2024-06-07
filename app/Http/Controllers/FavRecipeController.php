<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FavoritedRecipe;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;

class FavRecipeController extends Controller
{
    // Menampilkan semua resep favorit pengguna yang sedang login
    public function index()
    {

        $user = Auth::user();
        $favoritedRecipes = FavoritedRecipe::where('user_id', $user->id)->with('recipe')->get();

        // dd($favoritedRecipes);
         return view('recipefav', compact('favoritedRecipes'));
    }

    // Menyimpan resep ke daftar favorit pengguna yang sedang login
    public function store(Request $request, $recipeId)
    {
        $user = Auth::user();

        // Cek apakah resep sudah ada di favorit
        $exists = FavoritedRecipe::where('user_id', $user->id)->where('recipe_id', $recipeId)->exists();

        if ($exists) {
            return redirect()->back()->with('message',
                'Recipe already favorited'
            );
        }

        $favoritedRecipe = new FavoritedRecipe();
        $favoritedRecipe->user_id = $user->id;
        $favoritedRecipe->recipe_id = $recipeId;
        $favoritedRecipe->save();

        return redirect()->back()->with('message', 'Recipe favorited successfully');
    }

    // Menghapus resep dari daftar favorit pengguna yang sedang login
    public function unstore($recipeId)
    {
        $user = Auth::user();
        $favoritedRecipe = FavoritedRecipe::where('user_id', $user->id)->where('recipe_id', $recipeId)->first();

        if ($favoritedRecipe) {
            $favoritedRecipe->delete();
            return redirect()->route('favorites.index')->with('message', 'Recipe unfavorited successfully');
        }

        return redirect()->route('favorites.index')->with('error', 'Recipe not found in favorites');
    }
}