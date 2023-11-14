<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        
        $users = User::all();
        
        return response()->json(['users' => $users]);
    }

    public function store(Request $request)
    {
        // Validar 
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'id_cargo' => 'required'
        ]);

        // Crear usuario
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->id_cargo = $request->id_cargo;
        $user->save();

        return response()->json(['message' => 'Usuario registrado con éxito']);
    }
}
