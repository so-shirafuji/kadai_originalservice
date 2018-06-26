<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Shop;

class WelcomeController extends Controller
{
  
    public function index()
    {
        if(\Auth::check()){
            return redirect()->route('user.index');
        }
        
        return view('welcome');
    }
}