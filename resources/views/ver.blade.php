<h1>{{ $anuncio->titulo_of }}</h1>
<p>{{ $anuncio->Ciudad }}({{ $anuncio->Localidad }})</p>

<h2>Ofrece:</h2>
@foreach ($habilidades as $habilidad)
    @if ($anuncio->habilidad_ofrecida == $habilidad->id)
        <h3>{{ $habilidad->titulo }}</h3>
    @endif
@endforeach

<p>{{ $anuncio->descripcion_of }}</p>

<h2>Busca:</h2>
@foreach ($habilidades as $habilidad)
    @if ($anuncio->habilidad_buscada == $habilidad->id)
        <h3>{{ $habilidad->titulo }}</h3>
    @endif
@endforeach
<p>{{ $anuncio->descripcion_Bus }}</p>


<p>Publicado el {{ $anuncio->created_at }}</p>

<h1>datos de usuario</h1>
<a href="/anuncios/{{$usuario->id}}" >{{ $usuario->username }}</a>

@if ($media == 0)
    <p>Nuevo</p>
@else
    <p>{{ $media }}</p>
@endif

<button><a href="/mensajes/{{ $anuncio->id_usuario }}">contactar</a></button>

<h1>Anuncios similares</h1>
@foreach ($anunciosSimilares as $anuncio)
    <section>
        <a href="/ver/{{ $anuncio->id }}">
            <article>
                @foreach ($habilidades as $habilidad)
                    @if ($anuncio->habilidad_ofrecida == $habilidad->id)
                        <h3>{{ $habilidad->titulo }}</h3>
                    @endif
                @endforeach
            </article>
            <h4>{{ $anuncio->titulo_of }}</h4>
            <p>{{ $anuncio->descripcion_of }}</p>
        </a>
    </section>
@endforeach
