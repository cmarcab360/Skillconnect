<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function create(){
        return view('registro');
    }

    //Creación del usuario que se va a guardar
    public function store(){
        $attributes = request()->validate([
            'name'=>'required|',
            'username'=>'required|min:3|unique:usuarios,username',//unique:users,username-> comprueba que este valor en la tabla users y la columna username, sea único
            'email'=>'required|email|unique:usuarios,email',
            'password'=>'required'
        ]);
        //Se llama al mutator setPasswordAttributes automaticamente porque hago User->password
        $attributes['password'] = bcrypt($attributes['password']);
        $usuario = User::create($attributes);

        //Mantener el usuario logueado
        auth()->login($usuario);
        //Propagación id usuario y si es admin o no
        session(['user_id' => $usuario->id]);
        //session(['admin' => $user->admin]);
        //Mensaje flash guardado en session en caso de success
        session()->flash('success', 'Your account has been created!');
        return redirect('/home');//Cambiar a "/profile" cuando se cree
    }
}
