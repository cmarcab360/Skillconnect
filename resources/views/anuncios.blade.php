<h1>Mis Anuncios</h1>

@if ($listadoAnuncios->isEmpty())
    <p>No hay anuncios para mostrar.</p>
@else
    @foreach ($listadoAnuncios as $anuncio)
        <div>
        
            <h4>{{ $anuncio->tituloB }}</h4>
            <p>{{ $anuncio->habilidad_ofrecida }}</p>
            <!-- Muestra otros detalles del anuncio según sea necesario -->
        </div>
    @endforeach

@endif
