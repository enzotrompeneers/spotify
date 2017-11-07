<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Participation;

class DeelnemersController extends Controller
{
    public function index () {
        $admin_email = User::where('isAdmin', 1)->value('email');
        $participants = Participation::with(['user'])->has('user')->orderBy('points', 'desc')->get();

        
        return view('deelnemers', compact('admin_email', 'participants'));

    }

    public function destroy ($id) {
        $user = User::find($id);
        if(!$user) return redirect()->back();
        $user->delete();

        return redirect()->back()->with('userDisqualified', 'Je hebt een persoon gedisqualificeerd.');
    }
}
