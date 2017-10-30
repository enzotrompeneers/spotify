<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeelnemenController extends Controller
{
    public function index() {
    
    	return view ('deelnemen');
    }
}
