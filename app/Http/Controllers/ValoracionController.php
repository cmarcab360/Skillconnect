<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Valoracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ValoracionController extends Controller
{

    //Muestra las valoraciones de un usario
    public function show(Request $request)
    {
        $usuario = $request->usuario;
        $usuarioLogueado = Auth::id();
        $valoraciones = Valoracion::where('id_usuario_evaluado', $usuario)->get();
        $usuario = User::where('id', $usuario)->first();
        $usuarios = User::all();

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

        return view('/valoraciones')->with(compact('media', 'valoraciones', 'usuario', 'usuarioLogueado', 'usuarios'));
    }

    //Funcion para crear una valoracion
    public function create(Request $request)
    {
        //Valida los datos
        $request->validate([
            'calificacion' => 'required|integer|between:1,5',
            'comentario' => 'required|string'
        ]);

        // Si los datos son correctos crea una nueva valoracion
        Valoracion::create([
            'id_usuario_evaluador' => Auth::id(),
            'id_usuario_evaluado' =>  $request->input('id'),
            'calificacion' => $request->input('calificacion'),
            'comentario' => $request->input('comentario')
        ]);
        $id = $request->input('id');

        return redirect()->route('anuncios.show', ['id' => $id])->with('success', '¡Valoracion guardada!');
    }
}
