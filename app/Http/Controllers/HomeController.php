<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    public function index() {
        $admin = User::
        where('isAdmin', 1)
        ->get()
        ->pluck('email')
        ->toArray();

        return view('home', compact('admin'));
    }
}
