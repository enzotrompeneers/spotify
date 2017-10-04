<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParticipantsController extends Controller
{
    public function index() {
        return view('participants');
    }
    public function show ($id) {
        return view ('participant', compact('id'));
    }
}
