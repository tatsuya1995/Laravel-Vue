<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JsPracticeController extends Controller
{
    public function index() 
    {
        return view('jsPractice');
    }
    
    public function thanks(Request $request) 
    {
        $text = $request->text;
        return view('jsPractice', ['text' => $text]);
    }
}
