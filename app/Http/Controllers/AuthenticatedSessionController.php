<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\Config\Exception\ValidationException;

class AuthenticatedSessionController extends Controller
{

    public function store(Request $request)
    {

        $credenciales = $request->validate([

            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],

        ]);

        if (!Auth::attempt($credenciales, $request->boolean('remember'))) {
            
            echo 'Estas fuera';
            
            return to_route('login')->with('status', 'Estas fuera');

        } else {

            $request->session()->regenerate();
            return redirect()->intended()->with('status', 'Hola de nuevo');
        }
    }

    public function destroy(Request $request)
    {
     
        Auth::guard('web')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('login')->with('status', 'Estas fuera');


    }
}
