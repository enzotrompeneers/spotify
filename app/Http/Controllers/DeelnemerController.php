<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeelnemerController extends Controller
{
    public function show ($id) {
        return view ('deelnemer', compact('id'));
    }
    public function store() {
        
    }
}
