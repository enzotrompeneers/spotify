<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Contest;
use App\Participation;

class HomeController extends Controller
{
    public function index() {
        $admin_email = User::where('isAdmin', 1)->value('email');
        $active_contest = Contest::where('isActive', 1)->first();
        $contest_id = $active_contest->id;
        $participants = Participation::where('contest_id', $contest_id)->with(['user'])->has('user')->orderBy('points', 'desc')->take(10)->get();
        
        return view('home', compact('admin_email', 'participants'));
    }
}
