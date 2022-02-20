<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index() 
    {
        $hello = 'Hello World!';

        return view('index', ['hello' => $hello]);
    }
}
