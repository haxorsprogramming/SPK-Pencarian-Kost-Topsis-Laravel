<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\M_User;

class C_Auth extends Controller
{
    public function loginPage()
    {
        return view('auth.loginPage');
    }
    public function loginProses(Request $request)
    {
        // {'username':username, 'password':password}
       /**
         * Get post variable
         */
        $username = $request -> username;
        $usernameCaps = Str::upper($username);
        /**
         * Check total user
         */
        $totalUserDb = M_User::where('username', $usernameCaps) -> count();
        /**
         * Check & give result if user total < 1
         */
        if($totalUserDb > 0){
            /**
             * Get password from database with model
             */
            $dataUserDb = M_User::where('username', $usernameCaps) -> first();
            $passwordUserDb = $dataUserDb -> password;
            $passwordInput = $request -> password;
            /**
             * Get password verify with native php
             */
            $passwordHash = md5($passwordInput);
            if($passwordHash == $passwordUserDb){
                $dr = ['status' => 'success'];
            }else{
                $dr = ['status' => 'wrong_password'];
            }
        }else{
            $dr = ['status' => 'no_user'];
        }
        
        return \Response::json($dr);
    }
    public function logout(Request $request)
    {
        return redirect('/');
    }
}
