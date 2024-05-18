<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller implements HasMiddleware
{
  public function register(Request $request)
  {
    // validate data
    $request->validate([
      "username" => ["required", "min:5"],
      "password" => ["required", "min:3", "confirmed"], 
      "email" => ["required", "email","unique:users"]
    ]);


   
    // register user
    $user=User::create([
      "name" => $request->username,
      "email"=>$request->email,
      "password"=>$request->password,
      "role_id"=>3
    ]);
  }



  // login user
  public function login(Request $request){
   $request->validate([
    "email"=>"required|email",
    "password"=>"required"
  ]);



  $user=[
    "email"=>$request->email,
    "password"=>$request->password
  ];



  if(!Auth::attempt($user,$request->remember)){
   return back()->withErrors([
    "failed"=>"Incorrect Password"
   ]);
  }


  if(Auth::user()->role->name==="admins"){
    return redirect()->route("dashboard");
  }



  return redirect()->intended();
  }










  // logout user
 public function Logout(Request $request){
   Auth::logout();
   $request->session()->invalidate();
   $request->session()->regenerateToken();
   return redirect()->intended();
 }


 public static function middleware(){
 }
}
