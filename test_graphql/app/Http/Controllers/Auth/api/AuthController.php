<?php

namespace App\Http\Controllers\auth\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login(Request $res){

        $allValue = Validator::make($res->all(),[
            'email' => 'required|email',
            'password' => 'required|',
        ]);
           if($allValue->fails()){
               return response(['message' => 'Validation error']);
            }
            if(!Auth::attempt($res->all())){
                return response(['message' => 'Invaled is credential']);
            }
            else{
                $user = Auth::user();
                $token =  $user->createToken('authToken')->accessToken;
                return response(['test'=>$user,"token" => $token]);
            }

    }

}
