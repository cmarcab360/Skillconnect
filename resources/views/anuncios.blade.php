<x-layout>

    <x-header />
<p>Anuncios</p>
<a href="{{ route('valorar.mostrar', $id) }}">Valoraciones</a>

@if ($id == $usuarioLog)
    @if ($listadoAnuncios->isEmpty())
        <h1>Mis Anuncios</h1>
        <p>No hay anuncios para mostrar.</p>
    @else
        <h1>Mis Anuncios ({{ $numAnuncios }})</h1>
        @foreach ($listadoAnuncios as $anuncio)
            <section>
                <section>
                    @foreach ($habilidades as $habilidad)
                        @if ($anuncio->habilidad_ofrecida == $habilidad->id)
                            <h4>{{ $habilidad->titulo }}</h4>
                        @endif
                    @endforeach
                    <p><img src="{{ asset('fotos/usuario_base.png') }}" alt="Imagen base"
                            style="height: 50px; width: 50px;">{{ $usuario->username }}</p>
                </section>
                <article>
                    <h3>{{ $anuncio->titulo_of }}</h3>

                    <p>{{ $anuncio->descripcion_of }}</p>
                </article>
                <article>
                    <h3>{{ $anuncio->tituloB }}</h3>
                    @foreach ($habilidades as $habilidad)
                        @if ($anuncio->habilidad_buscada == $habilidad->id)
                            <h4>{{ $habilidad->titulo }}</h4>
                        @endif
                    @endforeach
                    <p>{{ $anuncio->descripcion_Bus }}</p>
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
@else
    <h2>Anuncios activos ({{ $numAnuncios }})</h2>
    <section>
        <p>{{ $usuario->username }}</p>
        <p><img src="{{ asset('fotos/usuario_base.png') }}" alt="Imagen base"
                style="height: 50px; width: 50px;">{{ $usuario->username }}</p>
    </section>

    @foreach ($listadoAnunciosExternos as $anuncio)
        <section>
            <a href="/ver/{{ $anuncio->id }}">
                <section>
                    @foreach ($habilidades as $habilidad)
                        @if ($anuncio->habilidad_ofrecida == $habilidad->id)
                            <h4>{{ $habilidad->titulo }}</h4>
                        @endif
                    @endforeach
                    <p><img src="{{ asset('fotos/usuario_base.png') }}" alt="Imagen base"
                            style="height: 50px; width: 50px;">{{ $usuario->username }}</p>
                </section>
                <article>
                    <h3>{{ $anuncio->titulo_of }}</h3>

                    <p>{{ $anuncio->descripcion_of }}</p>
                </article>
                <article>
                    <h3>{{ $anuncio->tituloB }}</h3>
                    @foreach ($habilidades as $habilidad)
                        @if ($anuncio->habilidad_buscada == $habilidad->id)
                            <h4>{{ $habilidad->titulo }}</h4>
                        @endif
                    @endforeach
                    <p>{{ $anuncio->descripcion_Bus }}</p>
                </article>
            </a>
        </section>
    @endforeach

@endif

</x-layout>