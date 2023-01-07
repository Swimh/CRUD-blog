<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function logout() {
        Auth::logout();
        return redirect('/');
    }

    public function create() {
        return view('register.login');
    }

    public function login(Request $request) {

        $attributes = $request->validate([
            'email'=>'required|exists:users,email',
            'password'=>'required'
        ]);

        if(auth()->attempt($attributes)) {
            return redirect('/');
        }
        
    }
}
