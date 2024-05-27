<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SesionController extends Controller
{
    //Lleva al fromulario de iniciar sesion
    public function create(){
        return view('welcome');
    }
    
    public function store(){
        //Validate
        $attributes = request()->validate([
            'email'=>'required|email',//exists:users,email-> comprueba que este valor en la tabla users y la columna username, exista
            'password'=>'required'
        ]);
        //Intentar Autenticar y login según los datos dados
        if(auth()->attempt($attributes)){
            session()->regenerate();//Para más seguridad se regenera la ID Session
            
            return redirect('/home')->with('success','Bienvenido!');
        }
        //Fallo de autenticacion withInput()->Deja los datos en los inputs cuando hay un error withErrors->personalizo el mensaje de la variable $errors de email
        return back()->withInput()->withErrors(['email' => 'El usuario o la contraseña es incorrecta, intente de nuevo']);
    }

    //Cerrar sesion
    public function destroy(){
        auth()->logout();
        return redirect('/')->with('success','Hasta pronto');
    }
}
