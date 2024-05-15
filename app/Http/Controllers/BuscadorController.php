<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Habilidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuscadorController extends Controller
{
    public function show(Request $request)
    {
        $userId = Auth::id();
        $habilidades = Habilidad::all();

        //Variable para almacenar los resultados de los anuncios
        $resultados = collect();
        $busqueda = [];
        $habilidad = '';
        //dd(((($request->input('ciudad') == null) && ($request->input('localidad') == null) && ($request->input('palabra') == null) && ($request->input('habilidad') == null)) || ($request->input('eliminar') !== null)) );

        //Si no hay filtros de busquedad o se eliminan los filtros envia todos los anuncios disponibles que no sean del usaurio loggeado
        if ((($request->input('ciudad') == null) && ($request->input('localidad') == null) && ($request->input('palabra') == null) && ($request->input('habilidad') == null)) || ($request->input('eliminar') !== null)) {
            
            $anuncios = Anuncio::where('id_usuario', '!=', $userId)->get();
            return view('home', compact('anuncios', 'userId', 'habilidades'));
        } else {

            // Si no va filtrando por cada campo
            if ($request->input('palabra') !== null) {
                echo "entro";
                $palabra = $request->input('palabra');
                $busqueda['palabra'] = $palabra;
                $anunciosPalabras = Anuncio::where('tituloB', 'like', '%' . $palabra . '%')
                    ->orWhere('descripcion_of', 'like', '%' . $request->input('palabra') . '%')->where('id_usuario', '!=', $userId)
                    ->get();
                $resultados = $resultados->merge($anunciosPalabras);
            }

            if ($request->input('habilidad') !== null) {
                $habilidad = $request->input('habilidad');
                if ($resultados->isEmpty()) {
                    echo "entro nuevo";
                    $anuncioshabilidad = Anuncio::where('habilidad_buscada', $habilidad)->where('id_usuario', '!=', $userId)
                        ->orWhere('habilidad_ofrecida', $habilidad)->where('id_usuario', '!=', $userId)->get();
                    $resultados = $resultados->merge($anuncioshabilidad);
                } else {
                    echo "entro por el filtro";
                    $anuncioshabilidad = []; 
                    foreach ($resultados as $resultado) {
                        if ($resultado->habilidad_buscada == $habilidad || $resultado->habilidad_ofrecida == $habilidad) {
                            $anuncioshabilidad[] = $resultado;
                        }
                    }
                    //dd($anunciosCiudad);
                    $resultados = collect(); // vacia la colección
                    $resultados = $resultados->merge($anuncioshabilidad);
                }
            }

            if ($request->input('ciudad') !== null) {
                $ciudad = $request->input('ciudad');
                $busqueda['ciudad'] = $ciudad;
                if (empty($resultados)) {

                    $anunciosCiudad = Anuncio::where('Ciudad', $ciudad)->where('id_usuario', '!=', $userId)->get();
                    $resultados = $resultados->merge($anunciosCiudad);
                } else {
                    $anunciosCiudad = []; 
                    foreach ($resultados as $resultado) {
                        if (strcasecmp($resultado->Ciudad, $ciudad) == 0) {
                            echo "true";
                            $anunciosCiudad[] = $resultado;
                        }
                    }
                    //dd($anunciosCiudad);
                    $resultados = collect(); // vacia la colección
                    $resultados = $resultados->merge($anunciosCiudad);
                }
            }

            if ($request->input('localidad') !== null) {
                $localidad = $request->input('localidad');
                $busqueda['localidad'] = $localidad;
                if (empty($resultados)) {
                    $anunciosLocalidad = Anuncio::where('Localidad', $localidad)->where('id_usuario', '!=', $userId)->get();
                    $resultados = $resultados->merge($anunciosLocalidad);
                } else {
                    $anunciosLocalidad = []; 
                    foreach ($resultados as $resultado) {
                        if (strcasecmp($resultado->Localidad, $localidad) == 0) {
                            $anunciosLocalidad[] = $resultado;
                        }
                    }
                    $resultados = collect(); // vacia la colección
                    $resultados = $resultados->merge($anunciosLocalidad);
                }
            }
        }

        return view('home', compact('userId', 'habilidades', 'resultados', 'busqueda', 'habilidad'));
    }
}
