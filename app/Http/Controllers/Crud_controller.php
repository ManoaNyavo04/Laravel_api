<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;

class Crud_controller extends Controller
{
    public function getAllUsers(Request $request){
        $user = Utilisateur::all();
        return response()->json($user);
    }

    public function addUser(Request $request){
        $validated = $request->validate([
            'username' => 'required|string|max:50',
            'email' => 'required|string|email|max:100|unique:utilisateur,email',
        ]);

        // Crée un nouvel utilisateur
        $user = Utilisateur::create($validated);

        // Retourne l'utilisateur créé avec le code de statut 201
        return response()->json($user, 201);
    }

    public function updateUser(Request $request, $id)
    {
        $user = Utilisateur::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $validated = $request->validate([
            'username' => 'required|string|max:50',
            'email' => 'required|string|email|max:100|unique:utilisateur,email,' . $id . ',user_id',
        ]);

        $user->update($validated);
        return response()->json($user, 200);
    }

}
