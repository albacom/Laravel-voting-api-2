<?php

namespace App\Http\Controllers;

use App\Models\User;
Use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $cols = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $cols['name'],
            'email' => $cols['email'],
            'password' => bcrypt($cols['password'])
        ]);

        $token = $user->createToken('sanctum_token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 200);
    }

    public function login(Request $request)
    {
        $cols = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $cols['email'])->first();

        if(!$user || !Hash::check($cols['password'], $user->password)){
            return response([
                'msg' => 'Either email or password dont match. Please try again!'
            ], 401);
        }

        $token = $user->createToken('sanctum_token')->plainTextToken;
        
        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 200);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return [
            'msg' => auth()->user()->name . ' you logged out'
        ];
    }
}
