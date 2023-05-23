<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class MonCompteController extends Controller
{
    public function index()
    {
        
        return view('moncompte');
    }
}