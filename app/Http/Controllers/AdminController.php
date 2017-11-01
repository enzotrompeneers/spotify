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
            $old_email = $old_admin->email;
            $user_admin = User::where('email', '=', $email)->first();

            if(!($email == $old_email)) {
                $user_admin->isAdmin = 1;
                $old_admin->isAdmin = 0;

                $user_admin->save();
                $old_admin->save();
                    
                $admin = false;
                $succes_message = "De verantwoordelijke is gewijzigd.";
            }
            
         }
         return view('home', compact('admin', 'email_exist', 'succes_message'));
         

       
    }
}
