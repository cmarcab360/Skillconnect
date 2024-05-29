<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Habilidad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //Funcion para obtener todos los anuncios disponibles que no sean del usario logueado
    public function home(Request $request)
    {
        $userId = Auth::id();

        //listado de anuncios diferentes al los del usuario
        $anuncios = Anuncio::where('id_usuario', '!=', $userId)->get();
        $usuarios = User::all();

        //listado de habilidades
        $habilidades = Habilidad::all();
        return view('home', compact('userId', 'anuncios', 'habilidades', 'usuarios'));

    }

    //Funcion para filtrar anuncios por campos
    public function show(Request $request)
    {
        $userId = Auth::id();
        $habilidades = Habilidad::all();
        $usuarios = User::all();
        

        //Variable para almacenar los resultados de los anuncios
        $resultados = collect();
        $busqueda = [];
        $habilidad_select = '';
        
        //Si no hay filtros de busquedad o se eliminan los filtros envia todos los anuncios disponibles que no sean del usaurio loggeado
        if ((($request->input('ciudad') == null) && ($request->input('localidad') == null) && ($request->input('palabra') == null) && ($request->input('habilidad') == null)) || ($request->input('eliminar') !== null)) {
            
            $anuncios = Anuncio::where('id_usuario', '!=', $userId)->get();
            return view('home', compact('anuncios', 'userId', 'habilidades', 'usuarios'));

        } else {
            // Si no va filtrando por cada campo
            if ($request->input('palabra') !== null) {
                $palabra = $request->input('palabra');
                $busqueda['palabra'] = $palabra;
                $anunciosPalabras = Anuncio::where('tituloB', 'like', '%' . $palabra . '%')
                    ->orWhere('descripcion_of', 'like', '%' . $request->input('palabra') . '%')->where('id_usuario', '!=', $userId)
                    ->get();
                $resultados = $resultados->merge($anunciosPalabras);
            }

            if ($request->input('habilidad') !== null) {
                $habilidad_select = $request->input('habilidad');
                if ($resultados->isEmpty()) {
                    $anuncioshabilidad = Anuncio::where('habilidad_buscada', $habilidad_select)->where('id_usuario', '!=', $userId)
                        ->orWhere('habilidad_ofrecida', $habilidad_select)->where('id_usuario', '!=', $userId)->get();
                    $resultados = $resultados->merge($anuncioshabilidad);
                } else {
                    $anuncioshabilidad = []; 
                    foreach ($resultados as $resultado) {
                        if ($resultado->habilidad_buscada == $habilidad_select || $resultado->habilidad_ofrecida == $habilidad_select) {
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
                
                if ($resultados->isEmpty()) {

                    $anunciosCiudad = Anuncio::where('Ciudad', $ciudad)->where('id_usuario', '!=', $userId)->get();
                    $resultados = $resultados->merge($anunciosCiudad);
                    
                } else {
                    $anunciosCiudad = []; 
                    dd($resultados);
                    foreach ($resultados as $resultado) {
                        if (strcasecmp($resultado->Ciudad, $ciudad) == 0) {
                            echo "true";
                            $anunciosCiudad[] = $resultado;
                        }
                    }
                    $resultados = collect(); // vacia la colección
                    $resultados = $resultados->merge($anunciosCiudad);
                   
                }
            }

            if ($request->input('localidad') !== null) {
                $localidad = $request->input('localidad');
                $busqueda['localidad'] = $localidad;
                if ($resultados->isEmpty()) {
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
        
        
        return view('home', compact('userId', 'habilidades', 'resultados', 'busqueda', 'habilidad_select', 'usuarios'));
    }
}
