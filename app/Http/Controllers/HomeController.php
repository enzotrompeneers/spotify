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
        
        if(!$active_contest) {
            $participants = null;
            $winners = null;
            return view('home', compact('admin_email', 'participants'));
        }
        $contest_id = $active_contest->id;
        $participants = Participation::where('contest_id', $contest_id)->with(['user'])->has('user')->orderBy('points', 'desc')->take(10)->get();   
        
        $inactive_contests = Contest::where('isActive', 0)->first();
        $inactive_contests_id = $inactive_contests->id;
        $winners = Participation::where('contest_id', $inactive_contests_id)->with(['user'])->has('user')->orderBy('points', 'desc')->take(10)->get();  
        
        return view('home', compact('admin_email', 'participants','winners'));
    }
}
