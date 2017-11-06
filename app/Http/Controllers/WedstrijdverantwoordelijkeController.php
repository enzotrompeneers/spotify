<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class WedstrijdverantwoordelijkeController extends Controller
{
    public function index() {
        $admin_email = User::where('isAdmin', 1)->value('email');
        
         return view('wedstrijdverantwoordelijke', compact('admin_email'));
    }

    public function update(Request $request) {
        $admin_email = User::where('isAdmin', 1)->value('email');

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
                $succes_message = "De wedstrijdverantwoordelijke is gewijzigd.";
                return view('home', compact('admin_email','succes_message'));
            }
            
         }
         return view('wedstrijdverantwoordelijke', compact('email_exist', 'succes_message', 'admin_email'));
         

       
    }
}
