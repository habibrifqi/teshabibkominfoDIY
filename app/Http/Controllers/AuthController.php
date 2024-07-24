<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;
class AuthController extends Controller
{

    public function generateToken(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;
        // $token = $user->createToken('auth_token');

        // Menyimpan waktu kedaluwarsa token secara manual
        $tokenId = explode('|', $token, 2)[0];
        $personalAccessToken = PersonalAccessToken::find($tokenId);
        $personalAccessToken->expires_at = now()->addMinutes(30);
        $personalAccessToken->save();

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => 30 * 60, // 30 menit dalam detik
        ]);
    }

    public function loginWithToken(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        // Menyimpan waktu kedaluwarsa token secara manual
        $tokenId = explode('|', $token, 2)[0];
        $personalAccessToken = PersonalAccessToken::find($tokenId);
        $personalAccessToken->expires_at = now()->addMinutes(30);
        $personalAccessToken->save();

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => 30 * 60, // 30 menit dalam detik
            'message' => 'Logged in successfully',
            'user' => $user,
        ]);
    }

    public function register(Request $request)
    {
        // return response()->json([
        //     'access_token' => 'asa',
        //     'token_type' => 'Bearer',
        // ]);
       
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:8',
        // ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function login(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|string|email',
        //     'password' => 'required|string',
        // ]);
        dd($request->all());

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid login details'], 401);
        }

        $user = Auth::user();

        dd($user);

        $token = $user->createToken('auth_token')->plainTextToken;

        // Menyimpan waktu kedaluwarsa token secara manual
        $tokenId = explode('|', $token, 2)[0];
        $personalAccessToken = PersonalAccessToken::find($tokenId);
        $personalAccessToken->expires_at = now()->addMinutes(30);
        $personalAccessToken->save();

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => 30 * 60, // 30 menit dalam detik
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
