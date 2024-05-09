<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Habilidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PublicarAnunciosController extends Controller
{
    public function show()
    {

        $habilidades = Habilidad::all();
        //dd($habilidades);
        $userId = Auth::id();
        return view('/publicar')->with(compact('userId', 'habilidades'));
    }

    public function create(Request $request)
    {

        $request->validate([
            'titulo_of' => 'required|string',
            'habilidad_ofrecida' => 'required|integer',
            'descripcion_of' => 'required|string',
            'localidad' => 'required|string',
            'ciudad' => 'required|string',
            'titulo_B' => 'required|string',
            'habilidad_buscada' => 'required|integer',
            'descripcion_bus' => 'required|string'

        ]);

        //Crea el anuncio
        Anuncio::create([
            'id_usuario' => Auth::id(),
            'habilidad_buscada' => $request->input('habilidad_buscada'),
            'habilidad_ofrecida' => $request->input('habilidad_ofrecida'),
            'tituloB' => $request->input('titulo_B'),
            'descripcion_bus' => $request->input('descripcion_bus'),
            'titulo_of' => $request->input('titulo_of'),
            'descripcion_of' => $request->input('descripcion_of'),
            'ciudad' => $request->input('ciudad'),
            'localidad' => $request->input('localidad')

        ]);

        // Redirigir de vuelta al perfil del usuario con un mensaje de éxito
        return redirect('/anuncios');
    }
}
