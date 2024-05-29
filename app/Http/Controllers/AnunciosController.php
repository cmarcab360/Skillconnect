<?php
namespace App\Http\Controllers;
use App\Models\Anuncio;
use App\Models\Habilidad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnunciosController extends Controller
{
    //Muestra los anuncios de un usuario específico.
    public function show(Request $request)
    {
        if (isset($request->id)) {
            $id = $request->id;
            $usuarioLog = Auth::id();
            $habilidades = Habilidad::all();
            $listadoAnuncios = Anuncio::where('id_usuario', $id)->get();
            $usuario = User::where('id', $id)->first();
            $numAnuncios = count($listadoAnuncios);
        } else {
            $id = Auth::id();
            $habilidades = Habilidad::all();
            $usuarioLog = Auth::id();
            $listadoAnuncios = Anuncio::where('id_usuario', $id)->get();
            $usuario = User::where('id', $id)->first();
            $numAnuncios = count($listadoAnuncios);
        }

        return view('/anuncios')->with(compact('listadoAnuncios', 'habilidades', 'id', 'usuario', 'numAnuncios', 'usuarioLog'));
    }


    //Elimina un anuncio
    public function delete($id)
    {
        $anuncio = Anuncio::find($id);

        if ($anuncio) {
            $anuncio->delete();
        }
        return redirect('/anuncios')->with('success', 'Anuncio eliminado exitosamente');
    }
}
