<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Participation;

class DeelnemersController extends Controller
{
    public function index () {
        $admin_email = User::where('isAdmin', 1)->value('email');
        
        $max_points = Participation::max('points');
        if ($max_points) {
            $user_id = Participation::where('points' , $max_points)->first()->value('user_id');
            $user_name = User::where('id', $user_id)->value('name');
            $participants = Participation::orderBy('points', 'DESC')->get();
            $users = User::all();

        } else {
            $participants = null;
        }
                
        echo $users['0']->id; 
        return view('deelnemers', compact('admin_email', 'participants', 'users'));

    }

    public function destroy ($id) {
        $user = User::find($id);
        $user->delete();
        return back()->with('userDisqualified', 'Je hebt een persoon gedisqualificeerd.');
    }
}
