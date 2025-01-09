<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AuthController extends Controller {

    public function login(Request $request){

        $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);

        $user = User::where('name', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {

            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken('YourAppName')->plainTextToken;

        return response()->json([
                                    'access_token' => $token,
                                    'token_type' => 'Bearer',
                                ]);
    }

    public function logout(Request $request){

        $request->user()->tokens->each(function ($token) {
            $token->delete();
        });

        return response()->json(['message' => 'Logged out successfully']);
    }

}
