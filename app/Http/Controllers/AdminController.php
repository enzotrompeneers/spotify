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

            $old_admin = User::where('isAdmin', '=', 1)->first();
            $user_admin = User::where('email', '=', $email)->first();
            
            $user_admin->isAdmin = 1;
            $old_admin->isAdmin = 0;
            
            $user_admin->save();
            $old_admin->save();
            $admin = false;
            

         }
         return view('home', compact('admin', 'email_exist'));
         

       
    }
}
