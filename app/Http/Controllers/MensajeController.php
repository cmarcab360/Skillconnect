<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use Illuminate\Http\Request;

class MensajeController extends Controller
{
    public function index()
    {
        $conversaciones = Mensaje::where('id_usario_emisor', auth()->user()->id)
            ->orWhere('id_usario_receptor', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('conversaciones.index', compact('conversaciones'));
    }

    public function show($id)
    {
        $conversacion = Mensaje::where('id', $id)
            ->where(function ($query) {
                $query->where('id_usario_emisor', auth()->user()->id)
                    ->orWhere('id_usario_receptor', auth()->user()->id);
            })
            ->firstOrFail();

        return view('conversaciones.show', compact('conversacion'));
    }

    public function enviarMensaje(Request $request)
    {
        // Lógica para enviar mensajes
    }
}
