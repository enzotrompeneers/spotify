<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Contest;
use App\Participation;
use DB;

class HomeController extends Controller
{
    public function index() {
        $admin_email = User::where('isAdmin', 1)->value('email');
        $active_contest = Contest::where('isActive', 1)->first();
        
        if(!$active_contest) {
            $participants = "";
            $winners = "";
            return view('home', compact('admin_email', 'participants', 'winners'));
        }
        $contest_id = $active_contest->id;
        $participants = Participation::where('contest_id', $contest_id)->with(['user'])->has('user')->orderBy('points', 'desc')->take(10)->get();
        
        $winners = Participation::with(['user'])->has('user')
        ->join(
            DB::raw("(SELECT id FROM contests WHERE isActive=0) inactive_contests"),
            function($join) {
                $join->on('inactive_contests.id', '=', 'participations.contest_id');
            }
        )
        ->join(
            DB::raw("
                (
                SELECT 
                    max(points) AS points, 
                    contest_id
                FROM participations 
                GROUP BY contest_id
                ) winners
            "),
            function($join) {
                $join->on('winners.contest_id', '=', 'participations.contest_id');
                $join->on('winners.points', '=', 'participations.points');
            }
        )
        ->get();
        return view('home', compact('admin_email', 'participants','winners'));
    }
}