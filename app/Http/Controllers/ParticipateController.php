<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParticipateController extends Controller
{
    public function index() {
        return view('participate');
    }
}
