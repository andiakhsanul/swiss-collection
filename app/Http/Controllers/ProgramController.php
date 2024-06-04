<?php

namespace App\Http\Controllers;

use App\Models\catProgram;
use App\Models\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgramController extends Controller
{
    public function store(Request $request){
        // dd($request);
        $Program = Program::with('categories')->create([
            'nama_program' => $request->nama_program,
            'deskripsi' => $request->deskripsi,
            'durasi_program' => $request->durasi_program,
            'menit_per_hari' => $request->menit_per_hari,
        ]);
        

        $categories = $request->categories;

        
        if (!empty($categories)) {
            $Program->categories()->attach($categories);
          }
       
        
        return redirect()->intended('admin/program');
    }
    public function destroy($id)
    {
        $Program=Program::findOrFail($id);
        $Program->categories()->detach();
        $Program->delete();

        return redirect()->intended('admin/program');
    }
    public function edit($id){
        $Program=Program::with('categories')->find($id);
        $cat = catProgram::all();
        return view('admin.editProgram', compact('Program', 'cat'));

    }
    public function update (Request $request,$id){
        $Program=Program::findOrFail($id);
        $Program->update($request->except('categories')); 


        $Program->categories()->sync($request->input('categories', []));
        return redirect()->intended('admin/program');
    }
}
