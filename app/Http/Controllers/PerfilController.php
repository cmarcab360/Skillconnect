<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function show(Request $request)
    {
        $userId = Auth::id();
        
        $usuario = Usuario::where('id', $userId)->first();
        //$contrasena_desencriptada = decrypt($usuario->password);
        return view('/perfil')->with(compact('usuario', 'userId'));
    }

    public function update(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'nombre' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'descripcion' => 'nullable|string',
            'localidad' => 'nullable|string',
            'ciudad' => 'nullable|string'
        ]);

        $userId = Auth::id();
        
        $usuario = Usuario::findOrFail($userId);
        //dd($usuario);

        // Actualizar los datos del usuario
        if ($usuario->nombre !== $request->nombre) {
            $usuario->nombre = $request->nombre;
        }
        
        if ($usuario->username !== $request->username) {
            $usuario->username = $request->username;
        }
       
        if ($usuario->email !== $request->email) {
            $usuario->email = $request->email;
        }
        
        if (($usuario->password) !== bcrypt($request->password)) {
            $usuario->password = bcrypt($request->password); //encriptar la contraseña
        }
        
        if ( $usuario->descripcion !== $request->descripcion) {
            $usuario->descripcion = $request->descripcion;
        }
       
        // Guardar los cambios en la base de datos
        $usuario->save();

        // Redirigir de vuelta al perfil del usuario con un mensaje de éxito
        return redirect()->route('perfil.show', $usuario->id)->with('success', '¡Perfil actualizado exitosamente!');

    }
}
