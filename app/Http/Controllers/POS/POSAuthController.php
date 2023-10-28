<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class POSAuthController extends Controller
{
    public function login(Request $request){

        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
        );

        if($validator->fails()){
            return redirect('/pos/sign-in')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }


        $credential =  $request->only('email','password');

        $userType = User::where('email',$request['email'])->count() > 0 ? User::where('email',$request['email'])->first()->user_type : "";


        if(Auth::attempt($credential) && $userType == "pos"){
            return redirect('/pos');
        }
        else{
            $validator->errors()->add('password','Your credential is not valid.');
            return redirect('/pos/sign-in')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }


    }
}
