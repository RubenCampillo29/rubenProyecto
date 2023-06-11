<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//add
use Illuminate\Validation\Rules;
use App\Models\User;
// use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function store(Request $request){
        
      
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
           'email' => ['required', 'string', 'email', 'unique:users'],
         'password' => ['required', 'string', Rules\Password::defaults()],
        ]);

      
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return to_route('login')->with('status', 'Account created');

    }
}
