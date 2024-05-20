<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Habilidad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnunciosController extends Controller
{
    public function show()
    {
        $id = Auth::id();
        $habilidades = Habilidad::all();
        $usuarioLog = Auth::id();
        $listadoAnuncios = Anuncio::where('id_usuario', $id)->get();
        $usuario = User::where('id', $id)->first();
        $numAnuncios = count($listadoAnuncios);

        return view('/anuncios')->with(compact('listadoAnuncios', 'habilidades', 'id', 'usuario', 'numAnuncios', 'usuarioLog'));
    }

    public function anunciosUsuario($id)
    {
        $usuarioLog = Auth::id();
            $habilidades = Habilidad::all();
            $listadoAnunciosExternos = Anuncio::where('id_usuario', $id)->get();
            $usuario = User::where('id', $id)->first();
            $numAnuncios = count($listadoAnunciosExternos);
       
        return view('/anuncios')->with(compact('listadoAnunciosExternos', 'habilidades', 'usuarioLog', 'id', 'usuario', 'numAnuncios'));
    }


    public function edit(Request $request, $id)
    {

        if ($request->isMethod('put')) {
            $request->validate([
                'titulo_of' => 'required|string',
                'habilidad_ofrecida' => 'required|integer',
                'descripcion_of' => 'required|string',
                'localidad' => 'required|string',
                'ciudad' => 'required|string',
                'titulo_B' => 'required|string',
                'habilidad_buscada' => 'required|integer',
                'descripcion_bus' => 'required|string'
            ]);
          // dd($request);
            $anuncio = Anuncio::findOrFail($request->id);
           
            

            // Actualizar los datos del usuario
            if ($anuncio->titulo_of !== $request->titulo_of) {
                $anuncio->titulo_of = $request->titulo_of;
            }

            if ($anuncio->tituloB !== $request->titulo_B) {
                $anuncio->tituloB = $request->titulo_B;
            }

            if ($anuncio->descripcion_of !== $request->descripcion_of) {
                $anuncio->descripcion_of = $request->descripcion_of;
            }

            if ($anuncio->descripcion_bus !== $request->descripcion_bus) {
                $anuncio->descripcion_bus = $request->descripcion_bus;
            }

            if ($anuncio->habilidad_ofrecida !== $request->habilidad_ofrecida) {
                $anuncio->habilidad_ofrecida = $request->habilidad_ofrecida;
            }

            if ($anuncio->habilidad_buscada !== $request->habilidad_buscada) {
                $anuncio->habilidad_buscada = $request->habilidad_buscada;
            }

            if ($anuncio->Localidad !== $request->localidad) {
                $anuncio->Localidad = $request->localidad;
            }

            if ($anuncio->Ciudad !== $request->ciudad) {
                $anuncio->Ciudad = $request->ciudad;
            }

            // Guardar los cambios en la base de datos
            $anuncio->save();

            // Redirigir de vuelta al perfil del usuario con un mensaje de éxito           


            return redirect('/anuncios')->with('success', '¡Anuncio actualizado exitosamente!');
        }

        // Obtener el anuncio que se desea editar
        $anuncios = Anuncio::findOrFail($id);
        //dd($anuncios);
        $habilidades = Habilidad::all();
        $userId = Auth::id();


        // Devolver la vista de edición junto con los datos del anuncio
        return view('editar')->with(compact('anuncios', 'habilidades', 'userId'));

    
    }

    public function delete($id)
    {
        $anuncio = Anuncio::find($id);

        if ($anuncio) {
            $anuncio->delete();
        }
        return redirect('/anuncios')->with('success', 'Anuncio eliminado exitosamente');
    }
}
