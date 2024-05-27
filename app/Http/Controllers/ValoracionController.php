<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Valoracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ValoracionController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'calificacion' => 'required|integer',
            'comentario' => 'required|string'
        ]);

        //Crea el anuncio
        Valoracion::create([
            'id_usuario_evaluador' => Auth::id(),
            'id_usuario_evaluado' =>  $request->input('id'),
            'calificacion' => $request->input('calificacion'),
            'comentario' => $request->input('comentario')
        ]);
        $id = $request->input('id');

        // Redirigir de vuelta al perfil del usuario con un mensaje de éxito
        //return view('/anuncios')->with(compact('id'));

        return redirect()->route('anuncios.show', ['id' => $id])->with('message', 'Valoración guardada exitosamente');
    }

    public function show(Request $request)
    {
        $usuario = $request->usuario;
        $usuarioLogueado = Auth::id();
        $valoraciones = Valoracion::where('id_usuario_evaluado', $usuario)->get();
        $usuario = User::where('id', $usuario)->first();
        $usuarios = User::all();

        if (!empty($valoraciones)) {
            $media = 0;
            if (count($valoraciones) > 1) {

                foreach ($valoraciones as $valoracion) {
                    $media += $valoracion->calificacion;
                }
                $media = round($media / count($valoraciones));
            } else {
                foreach ($valoraciones as $valoracion) {
                    $media += $valoracion->calificacion;
                }
            }
        } else {
            $media = 0;
        }

        return view('/valoraciones')->with(compact('media', 'valoraciones', 'usuario', 'usuarioLogueado', 'usuarios'));
    }
}
