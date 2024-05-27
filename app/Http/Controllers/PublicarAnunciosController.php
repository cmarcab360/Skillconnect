<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Habilidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PublicarAnunciosController extends Controller
{
    // Funcion para mostrar el formulrio de creacion de anuncio
    public function show()
    {
        $habilidades = Habilidad::all();
        //dd($habilidades);
        $userId = Auth::id();
        return view('/publicar')->with(compact('userId', 'habilidades'));
    }

    // Guarda el anuncio en la BD
    public function create(Request $request)
    {
        // Valida los datos recibidos por el formulario
        $request->validate([
            'titulo_of' => 'required|string|max:255',
            'habilidad_ofrecida' => 'required|integer|exists:habilidades,id',
            'descripcion_of' => 'required|string',
            'localidad' => 'required|string|max:50',
            'ciudad' => 'required|string|max:50',
            'titulo_B' => 'required|string|max:255',
            'habilidad_buscada' => 'required|integer|exists:habilidades,id',
            'descripcion_bus' => 'required|string'

        ]);

        // Si son validos crea un nuevo anuncio con los datos recibidos
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

        return redirect('/anuncios')->with('success', '¡Anuncio creado exitosamente!');;
    }
}
