<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\MessageBag;

class Signincontroller extends Controller
{


    public function checkLogin(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'username'=>'required|max:50|min:5',
            'password'=>'required|min:6'
        ]);

        if($validator->fails())
        {

            return back()->withErrors($validator);

        }else{

            $username = $request->input('username');

            $password = $request->input('password');

            $remember = $request->input('remember');

            if (Auth::attempt(['username' => $username, 'password' => $password],$remember)) {

                return redirect()->intended('home');

            }elseif(Auth::attempt(['email' => $username, 'password' => $password],$remember))
            {
                return redirect()->intended('home');

            }elseif(Auth::attempt(['employeeid' => $username, 'password' => $password],$remember))
            {

                return redirect()->intended('home');

            }else
            {

                $errors = new MessageBag(['password' => ['Invalid Username or Passowrd...!']]);


                return back()->withErrors($errors);

            }







//            if (Auth::attempt(['username' => $username, 'password' => $password])) {
//                // Authentication passed...
//                return redirect()->intended('home');
//            }else{
//
//                $errors = new MessageBag(['password' => ['Email and/or password invalid.']]);
//
//
//                return back()->withErrors($errors);
//            }

        }

    }


}
