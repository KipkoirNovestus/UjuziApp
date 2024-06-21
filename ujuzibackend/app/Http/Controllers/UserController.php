<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


class UserController extends Controller
{
    // register function 
    public function register(Request $request)
    {
        // Check if the user already exists
        $user = User::where('email', $request->email)->first();
        
        if ($user) {
            $response = [
                'status' => 0,
                'message' => 'Email Already Registered',
                'code' => 409
            ];
        } else {
            // Create a new user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $response = [
                'status' => 1,
                'message' => 'User Registered Successfully',
                'code' => 200
            ];
        }
        
        return response()->json($response);
    }

    // Log in Function 

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'status' => 0,
                    'code' => 401,
                    'message' => 'Email or Password is incorrect',
                    'data' => null,
                ]);
            }
        } catch (JWTException $e) {
            return response()->json([
                'data' => null,
                'code' => 500,
                'message' => 'Could not create token',
            ]);
        }

        $user = auth()->user();
        $data = [
            'token' => $token,
            'user' => [
                'user_id' => $user->id,
                'email' => $user->email,
            ],
        ];

        return response()->json([
            'data' => $data,
            'status' => 1,
            'code' => 200,
            'message' => 'Login Successfully',
        ]);
    }

}