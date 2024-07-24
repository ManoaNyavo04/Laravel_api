<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException ;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Mail;

class Auth_controller extends Controller
{
    public function register(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = Utilisateur::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Envoi d'un email de confirmation (implémentez cette partie selon vos besoins)
        // Mail::to($user->email)->send(new ConfirmEmail($user));

        return response()->json(['message' => 'User registered successfully'], 201);
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = Utilisateur::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken('auth-token')->plainTextToken;
        return response()->json(['token' => $token, 'user_id' => $user->id], 200);
    }
}
