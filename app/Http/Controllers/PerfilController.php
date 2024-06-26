<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    // Funcion para mostrar el perfil de usuario logueado
    public function show(Request $request)
    {
        $userId = Auth::id();
        $usuario = User::where('id', $userId)->first();

        return view('/perfil')->with(compact('usuario', 'userId'));
    }

    // Actualiza los datos del perfil de usuario en la BD
    public function update(Request $request)
    {
        $userId = Auth::id();
        $usuario = User::findOrFail($userId);

        // Validar los datos recibidos del formulario 
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|min:3|max:100|unique:users,username,' . $usuario->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $usuario->id,
            'password' => 'required|string|min:8',
            'descripcion' => 'nullable|string|max:255',
            'url_foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        //Si son correctos verifica si los datos recibidos son diferentes a los almacenados en la BD
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

            // Guardar el archivo en la carpeta
            $foto->store('users-avatar', 'public');
            
            $usuario->avatar = $foto->store();
            //dd($usuario->avatar);
        }

        // Guarda los cambios en la base de datos
        $usuario->save();

        return redirect()->route('perfil.show', $usuario->id)->with('success', '¡Perfil actualizado exitosamente!');
    }
}
