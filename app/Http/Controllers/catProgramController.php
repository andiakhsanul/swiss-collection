<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\catProgram;
use Illuminate\Http\Request;

class catProgramController extends Controller
{
    public function index(){
        return view('admin.categoriesform.program');
    }
    public function store(Request $request){
        $categories = catProgram::create([
            'nama_catProgram' => $request->categories
        ]);
        return redirect()->intended('admin/program');

    }
}
