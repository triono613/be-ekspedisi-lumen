<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;

class UserNewController extends Controller{

    public function login( Request $value) {

        $this->validate($value, [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:6'
        ]);

        $user = User::where('email', $value->email)->first();
        if ($user && Hash::check($value->password, $user->password) ){
                $token = Str::random(40);
                $user->update( ['api_token' => $token] );
                return response()->json(
                    [
                        'status' => '',
                        'token' => $token
                    ]
                );
                
                return response()->json(['status' => 'error']);
        }

    }


}




?>