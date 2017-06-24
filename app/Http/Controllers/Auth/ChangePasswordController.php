<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

use Auth;
use Hash;
use Validator;
/**
 * Description of ChangePasswordController
 *
 * @author Krzysztof
 */
class ChangePasswordController extends Controller{
    
    public function password(){
        return view('changepassword');
    }
    
    public function updatePassword(Request $request){
        $rules = [
            'mypassword' => 'required',
            'password' => 'required|confirmed|min:6',
        ];
        
        $messages = [
            'mypassword.required' => 'Wymagane aktualne hasło!',
            'password.required' => 'Wymagane nowe hasło!',
            'mypassword.confirmed' => 'Wymagane powtórzone hasło',
            'mypassword.min' => 'Minimum 6 znaków',
            ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect('changepassword')->withErrors($validator);
        }
        else{
            if (Hash::check($request->mypassword, Auth::user()->password)){
                $user = new User;
                $user->where('email', '=', Auth::user()->email)
                     ->update(['password' => bcrypt($request->password)]);
                return redirect('home')->with('message', 'Hasło zostało zmienione');
            }
            else
            {
                return redirect('changepassword')->with('message', 'Podano złe hasło');
            }
        }
    }
}
  