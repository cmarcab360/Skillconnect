<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Habilidad;
use App\Models\User;
use App\Models\Valoracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerAnuncioController extends Controller
{
    // Funcio para ver un anuncio en esprecifico
    public function show(Request $request)
    {
        $id = $request->id;
        $habilidades = Habilidad::all();
        $anuncio = Anuncio::where('id', $id)->first();
        $usuario = User::where('id', $anuncio->id_usuario)->first();
        $usuarioLog = Auth::id();

        //Busca 2 anuncios similares con el seleccionado
        $anunciosSimilares = Anuncio::where('habilidad_buscada', $anuncio->habilidad_buscada)->where('id', '!=', $anuncio->id)->limit(2)->get();

        //Busca la valoracion del usuario del anuncio
        $valoraciones = Valoracion::where('id_usuario_evaluado', $anuncio->id_usuario)->get();

        //Si hay mas valoraciones calcula la media
        if (!$valoraciones->isEmpty()) {
            $media = 0;
            if (count($valoraciones) > 1) {
                foreach ($valoraciones as $valoracion) {
                    $media += $valoracion->calificacion;
                }
                $media = round($media / count($valoraciones));
            } else { // Si es la primera valoracion se establece la calificacion como media
                foreach ($valoraciones as $valoracion) {
                    $media += $valoracion->calificacion;
                }
            }
        } else { //Si hay valoraciones se asigna a 0
            $media = 0;
        }

        return view('ver')->with(compact('anuncio', 'anunciosSimilares', 'usuario', 'usuarioLog', 'habilidades', 'media'));
    }
}
