<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $userId = Auth::id();
        $usuario = User::findOrFail($userId);

        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $usuario->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $usuario->id,
            'password' => 'nullable|string|min:8',
            'descripcion' => 'nullable|string|max:255',
            'url_foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Verificar si la validación falla
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

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

        if ($request->password !== "contraseña") {
            $usuario->password = bcrypt($request->password); //encriptar la contraseña
        }

        if ($usuario->descripcion !== $request->descripcion ) {
            $usuario->descripcion = $request->descripcion;
        }

        if ($usuario->avatar !== $request->url_foto && !empty($request->url_foto)) {
            $foto = $request->file('url_foto');

            // Guardar el archivo en la carpeta de almacenamiento
            $rutaFoto = $foto->store('fotos', 'public');

            $usuario->avatar = $rutaFoto;
        }

        // Guardar los cambios en la base de datos
        $usuario->save();

        // Redirigir de vuelta al perfil del usuario con un mensaje de éxito
        return redirect()->route('perfil.show', $usuario->id)->with('success', '¡Perfil actualizado exitosamente!');
    }
}
