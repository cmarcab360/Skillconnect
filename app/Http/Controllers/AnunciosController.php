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
    public function update(){
        $userId = Auth::id();
        $listadoAnuncios = Anuncio::where('id_usuario', $userId)->get();

        return view('/anuncios')->with(compact('listadoAnuncios'));
    }
    public function delete($id){
        $anuncio = Anuncio::find($id);

        if ($anuncio) {
            $anuncio->delete();
        } 
        return redirect('/anuncios')->with('success','Anuncio eliminado exitosamente');
    }
}
