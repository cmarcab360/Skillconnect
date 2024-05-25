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
    public function show(Request $request)
    {
        $id = $request->id;
        $habilidades = Habilidad::all();
        $anuncio = Anuncio::where('id', $id)->first();
        $usuario = User::where('id', $anuncio->id_usuario)->first();

        $anunciosSimilares = Anuncio::where('habilidad_buscada', $anuncio->habilidad_buscada)->where('id', '!=', $anuncio->id)->limit(3)->get();
        $valoraciones = Valoracion::where('id_usuario_evaluado', $anuncio->id_usuario)->get();

        if (!empty($valoraciones)) {
            $media = 0;
            foreach ($valoraciones as $valoracion) {
                $media += $valoracion->calificacion;
            }
            $media = round($media/count($valoraciones));
        }else{
            $media = 0;
        }

        return view('ver')->with(compact('anuncio', 'anunciosSimilares', 'usuario', 'habilidades', 'media'));
    }
}
