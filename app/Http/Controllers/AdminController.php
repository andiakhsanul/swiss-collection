<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;
use App\Models\recipe;
use App\Models\Program;
use App\Models\catRecipe;
use App\Models\catProgram;
use Illuminate\Http\Request;
use App\Models\CategoriesVideo;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){
        $user = User::count();
        $Video = Video::count();
        $Program = Program::count();
        $recipe = recipe::count();
        return view('admin.index', compact('user','Video', 'Program', 'recipe'));
    }
    public function Program(){
        $Program = Program::with('categories')->get();
        $cat = catProgram::all();
        return view("admin.viewAllProgram", compact('Program', 'cat'));
    }
    public function Recipe (){
        $recipe = recipe::with('categories')->get();
        $cat = catRecipe::all();
       
        return view("admin.viewAllRecipe", compact('recipe', 'cat' ));
    }
    public function Video (){
        $videos = Video::with('categories', 'program')->get();
        $cat = CategoriesVideo::all();
        $prog = Program::all();
        return view("admin.viewAllVideo", compact('videos', 'cat','prog'));
    }
    public function Categories (){
        return view("admin.viewCategories");
    }
    public function User (){
        $users = User::all();
        return view("admin.viewUsers", compact('users'));
    }
    public function UserForm($id){
        $user = User::findOrFail($id);
        return view ('admin.editUser', compact('user'));
    }
    public function updateUser(Request $request, $id){
        $user = User::findOrFail($id);
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->isAdmin = $request->input('isAdmin');
        $user->update();
        return redirect()->intended('/admin/user');
    }
    public function deleteUser($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->intended('/admin/user');
    }
}
