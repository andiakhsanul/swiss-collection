<?php

namespace App\Http\Controllers;

use App\Models\catRecipe;
use App\Models\recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class RecipeController extends Controller
{

    public function index()
{
    $categories = CatRecipe::with('recipe')->get();
    return view('recipe', compact('categories'));
}

    public function store(Request $request){
        $path = $request->file('gambar_recipe')->store('recipe_image', 'public');
        // dd($request);
        $recipe = recipe::with('categories')->create([
            'judul_recipe' => $request->judul_recipe,
            'deskripsi_recipe' => $request->deskripsi_recipe,
            'url_recipe' => $request->url_recipe,
            'durasi_recipe' => $request->durasi_recipe,
            'bahan_recipe' => $request->bahan_recipe,
            'cara_masak' => $request->cara_masak,
            'gambar_recipe' => $path,
        ]);
        $categories = $request->categories;


        if (!empty($categories)) {
            $recipe->categories()->attach($categories);
          }


        return redirect()->intended('admin/recipe');
    }

    public function destroy($id)
    {
        $recipe=recipe::findOrFail($id);
        $recipe->categories()->detach();
        Storage::delete('public/' . $recipe->gambar_recipe);
        $recipe->delete();

        return redirect()->intended('admin/recipe');
    }
    public function edit($id){
        $recipe=recipe::with('categories')->find($id);
        $cat = catRecipe::all();
        return view('admin.editRecipe', compact('recipe', 'cat'));

    }
    public function update(Request $request, $id)
    {
        try {
            // Temukan recipe berdasarkan ID
            $recipe = Recipe::findOrFail($id);

            // Jika ada gambar yang diunggah
            if ($request->hasFile('gambar_recipe')) {
                // Hapus gambar lama jika ada
                if ($recipe->gambar_recipe) {
                    Storage::disk('public')->delete($recipe->gambar_recipe);
                }

                // Simpan gambar baru
                $path = $request->file('gambar_recipe')->store('recipe_image', 'public');
                $recipe->gambar_recipe = $path;
            }

            // Update data recipe
            $recipe->judul_recipe = $request->judul_recipe;
            $recipe->durasi_recipe = $request->durasi_recipe;
            $recipe->deskripsi_recipe = $request->deskripsi_recipe;
            $recipe->bahan_recipe = $request->bahan_recipe;
            $recipe->cara_masak = $request->cara_masak;
            $recipe->url_recipe = $request->url_recipe;
            $recipe->save();

            // Sinkronkan kategori
            $recipe->categories()->sync($request->input('categories', []));

            // Redirect ke halaman yang diinginkan setelah berhasil update
            return redirect()->intended('admin/recipe');
        } catch (\Exception $e) {
            // Tangani exception di sini, misalnya log dan kembalikan pesan kesalahan
            Log::error('Error updating recipe: ' . $e->getMessage());
            return back()->withError('Gagal mengupdate resep. Silakan coba lagi.');
        }
    }
}