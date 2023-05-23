<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
         
            return redirect()->route('admin.dashboard');
        } else {
            
            return redirect()->back()->withErrors(['message' => 'Identifiants invalides']);
        }
    }
}
