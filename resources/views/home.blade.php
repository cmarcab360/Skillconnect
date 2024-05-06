<h1>Inicio</h1>

<button><a href="/perfil">Perfil</a></button>
<button><a href="/anuncios">Anuncios</a></button>
<button><a href="publicar">Agregar anuncio</a></button>
<br><a href="/logout">Cerrar sesion</a>


@foreach ($habilidades as $habilidad)
    <p>{{$habilidad->titulo}}</p>
@endforeach


<h1>Listado de anuncios</h1>
@foreach ( $anuncios as $anuncio)
    <section>
        <article>
            <h3>{{$anuncio->titulo_of}}</h3>
            @foreach ($habilidades as $habilidad)
                @if ($anuncio->habilidad_ofrecida == $habilidad->id)
                    <h4>{{$habilidad->titulo}}</h4>
                @endif
            @endforeach
            <p>{{$anuncio->descripcion_of}}</p>
        </article>
        <article>
            <h3>{{$anuncio->tituloB}}</h3>
            @foreach ($habilidades as $habilidad)
                @if ($anuncio->habilidad_buscada == $habilidad->id)
                    <h4>{{$habilidad->titulo}}</h4>
                @endif
            @endforeach
            <p>{{$anuncio->descripcion_Bus}}</p>
        </article>
    </section>
@endforeach