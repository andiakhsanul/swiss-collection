<?php

use App\Models\CategoriesVideo;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\catRecipeController;
use App\Http\Controllers\catProgramController;
use App\Http\Controllers\CategoryVideoController;
use App\Models\recipe;
use App\Models\catRecipe;
use App\Http\Controllers\FavRecipeController; // Add this line


Route::get('/', function () {
    return view('index');
});
Route::get('/signin', function () {
    return view('login');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/recipe', [RecipeController::class, 'index'])->name('recipe')->middleware('auth');

Route::get('/resep/{id_recipe}', function ($id_recipe) {
    $recipe = Recipe::findOrFail($id_recipe);
    return view('detail-resep', compact('recipe'));
})->name('resep.show');

Route::get('/das_user', function () {
    $user = Auth::user();
    return view('das_user', compact('user'));
});

Route::get('/video', function () {
    if (Auth::check()) {
        // Mengambil semua kategori beserta video-videonya
        $categories = CategoriesVideo::with('video')->get();

        // Mengirim data kategori ke view video.blade.php
        return view('video', compact('categories'));
    } else {
        return view('login'); // Assuming you have a named route for login
    }
});

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::prefix('/admin')->group(function(){
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/program', [AdminController::class, 'Program'])->name('program');
    Route::post('/program', [ProgramController::class, 'store'])->name('program.add');
    Route::get('/program/categories', [catProgramController::class, 'index'])->name('categories.program');
    Route::post('/program/categories', [catProgramController::class, 'store'])->name('categories.program.add');
    Route::get('/program/edit/{id}', [ProgramController::class, 'edit'])->name('program.edit');
    Route::put('/program/edit/{id}', [ProgramController::class, 'update'])->name('program.update');
    Route::delete('/program/delete/{id}', [ProgramController::class, 'destroy'])->name('program.delete');
    Route::get('/video', [AdminController::class, 'Video'])->name('video');
    Route::get('/video/categories', [CategoryVideoController::class, 'index'])->name('categories.video');
    Route::post('/video/categories', [CategoryVideoController::class, 'store'])->name('categories.video.add');
    Route::post('/video', [VideoController::class, 'store'])->name('video.add');
    Route::get('/video/edit/{id}', [VideoController::class, 'edit'])->name('video.edit');
    Route::put('/video/edit/{id}', [VideoController::class, 'update'])->name('video.update');
    Route::delete('/video/delete/{id}', [VideoController::class, 'destroy'])->name('video.delete');
    Route::get('/recipe', [AdminController::class, 'Recipe'])->name('recipe');
    Route::post('/recipe', [RecipeController::class, 'store'])->name('recipe.add');
    Route::get('/recipe/categories', [catRecipeController::class, 'index'])->name('categories.recipe');
    Route::post('/recipe/categories', [catRecipeController::class, 'store'])->name('categories.recipe.add');
    Route::get('/recipe/edit/{id}', [RecipeController::class, 'edit'])->name('recipe.edit');
    Route::put('/recipe/edit/{id}', [RecipeController::class, 'update'])->name('recipe.update');
    Route::delete('/recipe/delete/{id}', [RecipeController::class, 'destroy'])->name('recipe.delete');
    Route::get('/user', [AdminController::class, 'User'])->name('user');
    Route::get('/user/edit/{id}', [AdminController::class, 'UserForm'])->name('editUser');
    Route::put('/user/edit/{id}', [AdminController::class, 'updateUser'])->name('updateUser');
    Route::delete('/user/delete/{id}', [AdminController::class, 'deleteUser'])->name('deleteUser');
    Route::get('/admin/favorites', [AdminController::class, 'favindex'])->name('admin.favorites.index');
});

Route::controller(UserController::class)->group(function (){
    Route::get('/user', 'index');
    Route::post('/login', 'store')->name('add');
    Route::post('/auth', 'login')->name('auth');
    Route::get('/logout', 'Logout')->name('logout');
    Route::put('/edit', 'edit')->name('edit');
});

Route::controller(FavRecipeController::class)->group(function () {
    Route::get('/favorites', [FavRecipeController::class, 'index'])->name('favorites.index');
    Route::post('/favorites/{recipe}', [FavRecipeController::class, 'store'])->name('favorite');
    Route::delete('/favorites/{id}', [FavRecipeController::class, 'unstore'])->name('unfavorite');
});