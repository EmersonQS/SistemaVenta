<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    public function edit()
    {
        /** @var \App\Models\User $registro */
        $registro = Auth::user();

        return view('autenticacion.perfil', compact('registro'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:4|confirmed',
        ]);

        /** @var \App\Models\User $registro */
        $registro = Auth::user();

        $registro->name = $request->name;
        $registro->email = $request->email;

        if ($request->filled('password')) {
            $registro->password = Hash::make($request->password);
        }

        $registro->save();

        return redirect()
            ->route('perfil.edit')
            ->with('success', 'Datos actualizados correctamente.');
    }
}
