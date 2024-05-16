<p>Anuncios</p>
<a href="{{ route('valorar.mostrar', $id) }}">Valoraciones</a>

@if (isset($listadoAnunciosExternos) && !empty($listadoAnunciosExternos))
    <h1>Anuncios activos ()</h1>
    @foreach ($listadoAnunciosExternos as $anuncio)
        <section>
            <article>
                <h3>{{ $anuncio->tituloB }}</h3>
            </article>

        </section>
    @endforeach
@elseif ($listadoAnuncios->isEmpty())
    <h1>Mis Anuncios</h1>
    <p>No hay anuncios para mostrar.</p>
@else
    <h1>Mis Anuncios</h1>
    @foreach ($listadoAnuncios as $anuncio)
        <section>
            <article>
                <h3>{{ $anuncio->tituloB }}</h3>
            </article>
            <form action="{{ route('anuncios.delete', $anuncio->id) }}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" value="Eliminar">
            </form>
            <a href="{{ route('anuncios.editar', $anuncio->id) }}">Editar</a>


        </section>
    @endforeach

@endif
