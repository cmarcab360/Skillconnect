<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Habilidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ediarAnuncioController extends Controller
{
    // Funcion para editar un anuncio
    public function edit(Request $request)
    {
        $request->validate([// Valida los datos recibidos
            'titulo_of' => 'required|string|max:255',
            'habilidad_ofrecida' => 'required|integer|exists:habilidades,id',
            'descripcion_of' => 'required|string',
            'localidad' => 'required|string|max:50',
            'ciudad' => 'required|string|max:50',
            'titulo_B' => 'required|string|max:255',
            'habilidad_buscada' => 'required|integer|exists:habilidades,id',
            'descripcion_bus' => 'required|string'
        ]);
        
        // Si los datos son correctos busca el anuncio y compra los datos con lo que habia en la BD
        $anuncio = Anuncio::findOrFail($request->id_anuncio);

        // Actualizar los datos del usuario si los datos enviados son diferentes a los de la BD
        if ($anuncio->titulo_of !== $request->titulo_of) {
            $anuncio->titulo_of = $request->titulo_of;
        }

        if ($anuncio->tituloB !== $request->titulo_B) {
            $anuncio->tituloB = $request->titulo_B;
        }

        if ($anuncio->descripcion_of !== $request->descripcion_of) {
            $anuncio->descripcion_of = $request->descripcion_of;
        }

        if ($anuncio->descripcion_bus !== $request->descripcion_bus) {
            $anuncio->descripcion_bus = $request->descripcion_bus;
        }

        if ($anuncio->habilidad_ofrecida !== $request->habilidad_ofrecida) {
            $anuncio->habilidad_ofrecida = $request->habilidad_ofrecida;
        }

        if ($anuncio->habilidad_buscada !== $request->habilidad_buscada) {
            $anuncio->habilidad_buscada = $request->habilidad_buscada;
        }

        if ($anuncio->Localidad !== $request->localidad) {
            $anuncio->Localidad = $request->localidad;
        }

        if ($anuncio->Ciudad !== $request->ciudad) {
            $anuncio->Ciudad = $request->ciudad;
        }

        // Guarda los cambios en la base de datos
        $anuncio->save();

        return redirect('/anuncios')->with('success', '¡Anuncio actualizado exitosamente!');
    }


    public function show(Request $request)
    {
        // Obtener el anuncio que se va a editar y muestra el formulario
        $id = $request->id;
        $anuncios = Anuncio::findOrFail($id);
        $habilidades = Habilidad::all();
        $userId = Auth::id();

        // Devolver la vista de edición junto con los datos del anuncio
        return view('/editar')->with(compact('anuncios', 'habilidades', 'userId'));
    }
}
