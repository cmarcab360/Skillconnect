<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PerfilController extends Controller
{
    public function show(Request $request)
    {
        $userId = Auth::id();

        $usuario = User::where('id', $userId)->first();
        //$contrasena_desencriptada = decrypt($usuario->password);
        return view('/perfil')->with(compact('usuario', 'userId'));
    }

    public function update(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'descripcion' => 'nullable|string',
            'url_foto' => 'nullable|image|mimes:jpeg,png,jpg,gif',

        ]);

        $userId = Auth::id();

        $usuario = User::findOrFail($userId);
        //dd($usuario);

        // Actualizar los datos del usuario
        if ($usuario->name !== $request->name) {
            $usuario->name = $request->name;
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

        if ($usuario->descripcion !== $request->descripcion) {
            $usuario->descripcion = $request->descripcion;
        }
        if ($usuario->url_foto !== $request->url_foto) {
            $foto = $request->file('url_foto');

            // Guardar el archivo en la carpeta de almacenamiento
            $rutaFoto = $foto->store('fotos', 'public');;

            $usuario->url_foto = $rutaFoto;
        }

        // Guardar los cambios en la base de datos
        $usuario->save();

        // Redirigir de vuelta al perfil del usuario con un mensaje de éxito
        return redirect()->route('perfil.show', $usuario->id)->with('success', '¡Perfil actualizado exitosamente!');
    }
}
