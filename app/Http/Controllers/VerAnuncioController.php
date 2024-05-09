<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Habilidad;
use App\Models\User;
use Illuminate\Http\Request;

class VerAnuncioController extends Controller
{
    public function show($id)
    {
        $anuncio = Anuncio::where('id', $id)->first();
       //dd($anuncio);
        $anunciosSimilares = Anuncio::where('habilidad_buscada', $anuncio->habilidad_buscada)->where('id', '!=', $anuncio->id)->limit(3)->get();
        $usuario = User::where('id', $anuncio->id_usuario)->first();
   
        $habilidades = Habilidad::all();

        return view('/ver')->with(compact('anuncio', 'anunciosSimilares', 'usuario', 'habilidades'));
    }
}
