<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contest;
use App\User;

class DatumController extends Controller
{
    public function create() {
        return view('home');
    }

    public function show() {
        $contests = Contest::all();
        $admin_email = User::where('isAdmin', '=', 1)->first()->email;
    	return view ('wedstrijddatums', compact('contests', 'admin_email'));
    }
}
