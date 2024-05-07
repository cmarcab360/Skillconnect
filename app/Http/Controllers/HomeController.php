<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Habilidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $userId = Auth::id();

        //listado de anuncios diferentes al los del usuario
        $anuncios = Anuncio::where('id_usuario', '!=', $userId)->get();

        //listado de habilidades
        $habilidades = Habilidad::all();
        return view('home', compact('userId', 'anuncios', 'habilidades'));

    }
}
