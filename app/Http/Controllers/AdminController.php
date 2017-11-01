<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function update(Request $request) {
        $admin = User::
        where('isAdmin', 1)
        ->get()
        ->pluck('email')
        ->toArray();
        
        $email = $request->get("email");
        $email_exist = false;

        if (User::where('email', '=', $email)->exists()) {
            $email_exist = true;
            

         }


        return view('home', compact('admin', 'email_exist'));
    }
}
