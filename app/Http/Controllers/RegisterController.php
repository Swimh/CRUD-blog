<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create() {

        return view('register.create');
    }

    public function store(Request $request) {
       
        $attributes = $request->validate([
            'name' =>'required',
            'username'=>'required|unique:users,username',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:7'
        ]);
        
        $user = User::create($attributes);

        Auth::login($user);

        return redirect('/');
    }

}
