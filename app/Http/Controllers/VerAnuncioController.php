<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Habilidad;
use App\Models\Usuario;
use Illuminate\Http\Request;

class VerAnuncioController extends Controller
{
    public function show($id)
    {
        $anuncio = Anuncio::where('id', $id)->first();
        $anunciosSimilares = Anuncio::where('habilidad_buscada', $anuncio->habilidad_buscada)->where('id', '!=', $anuncio->id)->limit(3)->get();
        $usuario = Usuario::where('id', $anuncio->id)->first();
        $habilidades = Habilidad::all();

        return view('/ver')->with(compact('anuncio', 'anunciosSimilares', 'usuario', 'habilidades'));
    }
}
