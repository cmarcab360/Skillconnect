<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    //Lleva al fromulario de registro
    public function create(){
        return view('registro');
    }

    // Creación del usuario que se va a guardar
    public function store(){
        $attributes = request()->validate([
            'name'=>'required|string|max:255',
            'username'=>'required|min:3|unique:users,username',//unique:users,username-> comprueba que este valor en la tabla users y la columna username, sea único
            'email'=>'required|email|unique:users,email',
            'password'=>'required|string|min:8'
        ]);
        
        //Encripta la contraseña para guardarla en la BD
        $attributes['password'] = bcrypt($attributes['password']);

        //Crea el usuario con los parametros recibidos
        $usuario = User::create($attributes);

        //Mantener el usuario logueado
        auth()->login($usuario);

        //Mensaje flash guardado en session en caso de success
        session()->flash('success', 'Cuenta creada exitosamente!');
        return redirect('/home');
    }
}
