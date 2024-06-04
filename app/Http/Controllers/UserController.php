<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('index', compact('user'));
    }
    public function store(Request $request){
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return view('login');
    }

    public function login (Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'password' =>'required'
        ]);
        if (Auth::attempt($credentials)) {
        $user = Auth::user();
        if ($user->isAdmin == 1) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        } else {
            $request->session()->regenerate();
            return redirect()->intended('/user');
        }
    } 
    }
    public function Logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->intended('/');
    }

    public function edit (Request $request){
        $user = Auth::user()->id;
        $user = User::findOrFail($user);
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->password = $request->input('pasword');
        $user->email = $request->input('email');
        $user->update();

        return redirect()->intended('/user');
    }
}
