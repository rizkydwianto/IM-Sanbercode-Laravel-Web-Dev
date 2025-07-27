<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function formdaftar()
    {
        return view('regiter');
    }
    public function welcome(request $request);
        dd($request->all());
      
    }
}
