<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnunciosController extends Controller
{
    public function show(){
        $userId = Auth::id();
        $listadoAnuncios = Anuncio::where('id_usuario', $userId)->get();

        return view('/anuncios')->with(compact('listadoAnuncios'));
    }
}
