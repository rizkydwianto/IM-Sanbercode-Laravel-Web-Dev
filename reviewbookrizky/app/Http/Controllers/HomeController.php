<?php

namespace App\Http\Controllers;

use illuminate\Http\Request;

class HomeController extends Controller
{
    public function formregister() {
        return view('register');
    }
        public function welcome() 
    {
        return view ('home');
    }
}
