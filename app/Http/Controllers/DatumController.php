<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contest;

class DatumController extends Controller
{
    public function create() {
        return view('home');
    }

    public function show() {
        $contests = Contest::all();


	    
    
    	return view ('wedstrijddatums', compact('contests'));
    }
}
