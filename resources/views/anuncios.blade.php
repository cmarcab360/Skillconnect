<h1>Mis Anuncios</h1>

@if ($listadoAnuncios->isEmpty())
    <p>No hay anuncios para mostrar.</p>
@else
    @foreach ($listadoAnuncios as $anuncio)
    <section>
        <article><h3>{{ $anuncio->tituloB }}</h3></article>

    </section>
       
    @endforeach

@endif
