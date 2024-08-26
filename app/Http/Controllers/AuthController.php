<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function register(Request $request){
        $fields = $request ->validate([
            'name' =>'required|string',
            'email'=>'required|string',
            'password'=>'required|string|confirmed',
            'role' => 'required|in:admin,user'
        ]);
    
        $user = User::create([
            'name'=> $fields['name'],
            'email'=> $fields['email'],
            'password'=> bcrypt($fields['password']),
            'role' =>strtolower($fields['role'])
        ]);
    
        $token = $user ->createToken('myapptoken')->plainTextToken;
    
        $response= [
            'user' => $user,
            'token' => $token
        ];
    
        return response ($response ,201);
        }
    
        public function logout (Request $resquest){
           // auth()->user()->tokens()->delete();
    
            return[
                'message'=> 'Logged Out'
            ];
        }
        public function login(Request $request){
            $fields = $request ->validate([
                'email' =>'required|string|unique:users,email',
                'password'=>'required|string'
            ]);
    
            $user = User::where('email', $fields['email'])->first();
    
            //Check Password
            if(!$user || !Hash::check($fields['password'], $user->password)){
                return response([
                    'message'=>'Username or Password Doesnt match'
                ], 401);
            }
    
            $token = $user ->createToken('myapptoken')->plainTextToken;
    
            $response= [
                'user' => $user,
                'token' => $token
            ];
    
            return response ($response ,201);
        }
    
        public function index()
        {
            return User::all();
        }
    
        public function update(Request $request, string $id)
        {
            $user = User::find($id);
            $user->update($request->all());
            return $user;
        }
    
        public function search(string $name)
        {
            return User::where('name', 'like' ,'%'.$name.'%')->get();
        }
    
        public function show(string $id)
        {
            return User::find($id);
        }
    
}
