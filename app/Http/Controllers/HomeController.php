<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Participation;

class HomeController extends Controller
{
    public function index() {
        $admin_email = User::where('isAdmin', 1)->value('email');

        $max_points = Participation::max('points');
        $user_id = Participation::where('points' , $max_points)->first()->value('user_id');
        $user_name = User::where('id', $user_id)->value('name');

        $participants = Participation::orderBy('points', 'DESC')->get();
        

        echo $user_name;
        return view('home', compact('admin_email', 'participants'));
    }
}
