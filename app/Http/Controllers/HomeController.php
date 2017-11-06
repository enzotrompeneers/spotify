<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Participation;

class HomeController extends Controller
{
    public function index() {
        $admin_email = User::where('isAdmin', '=', 1)->value('email');
        $participants = Participation::with(['user'])->orderBy('points', 'desc')->get();
        
        return view('home', compact('admin_email', 'participants'));
    }
}
