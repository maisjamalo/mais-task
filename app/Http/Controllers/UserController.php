<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UserController extends Controller
{
    public function signUp(Request $request){
     $validate= Validator::make($request->all(),
     [
         'name'=>'required:users',
         'email'=>'required|email:users',
         'password'=>'min:5|required:users'
     ]);
     
     if($validate->fails()){
         return response()->json([
             'errors'=>$validate->errors(),
             'status'=>400,
             'message'=>'create un successfully']);
     }
     $user=User::create([
         'name'=>$request->name,
         'password'=>Hash::make($request->password),
         'email'=>$request->email]);
     $token =$user->createToken('UserToken')->plainTextToken;

     return response()->json([
         'data'=>$user,
         'token'=>$token,
         'status'=>200,
         'message'=>'create successfully']);
     }

     public function login(Request $request){
         $validate= Validator::make($request->all(),
        [
             'email'=>'required|email:users',
             'password'=>'min:5|required:users'
         ]);
   
         if($validate->fails()){
             return response()->json([
                 'errors'=>$validate->errors(),
                 'status'=>400]);
         }

         $user=User::where('email',$request->email)->first();
         if($user && Hash::check($request->password, $user->password)){
            $token =$user->createToken(request()->userAgent())->plainTextToken;
             return response()->json([
             'data'=>$user,
             'token'=>$token,
             'message'=>'login successfully']);
         }
         return response()->json([
         'message'=>'login unsuccessfully check your email or password or create account'
         ]);

         }
 }
