<h1>Inicio</h1>
<p>Usuario id:{{ $userId }}</p>

<button><a href="/perfil">Perfil</a></button>
<button><a href="/anuncios">Anuncios</a></button>
<button><a href="publicar">Agregar anuncio</a></button>
<br><a href="/logout">Cerrar sesion</a>

<form action="/home" method="post">
    @csrf
    <label for="ciudad">Ciudad</label>
    @if (!isset($busqueda['ciudad']))
        <input type="text" name="ciudad" id="ciudad" placeholder="Introduce la ciudad">
    @else
        <input type="text" name="ciudad" id="ciudad" value="{{ $busqueda['ciudad'] }}">
    @endif

    <label for="localidad">Localidad</label>
    @if (!isset($busqueda['localidad']))
        <input type="text" name="localidad" id="localidad" placeholder="Introduce la localidad">
    @else
        <input type="text" name="localidad" id="localidad" value="{{ $busqueda['localidad'] }}">
    @endif

    <label for="palabra">Palabras clave</label>
    @if (!isset($busqueda['palabra']))
        <input type="text" name="palabra" id="palabra" placeholder="Introduce la palabra">
    @else
        <input type="text" name="palabra" id="palabra" value="{{ $busqueda['palabra'] }}">
    @endif

    <button type="submit">Buscar</button>
</form>

@foreach ($habilidades as $habilidad)
    <p>{{ $habilidad->titulo }}</p>
@endforeach


@if (isset($resultados) && !empty($resultados))
    @foreach ($resultados as $anuncio)
        <section>
            <a href="/ver/{{ $anuncio->id }}">
                <p>Usuario id:{{ $anuncio->id_usuario }}</p>
                <article>
                    <h3>{{ $anuncio->titulo_of }}</h3>
                    @foreach ($habilidades as $habilidad)
                        @if ($anuncio->habilidad_ofrecida == $habilidad->id)
                            <h4>{{ $habilidad->titulo }}</h4>
                        @endif
                    @endforeach
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
@else
    <h1>Listado de anuncios</h1>
    @foreach ($anuncios as $anuncio)
        <section>
            <a href="/ver/{{ $anuncio->id }}">
                <p>Usuario id:{{ $anuncio->id_usuario }}</p>
                <article>
                    <h3>{{ $anuncio->titulo_of }}</h3>
                    @foreach ($habilidades as $habilidad)
                        @if ($anuncio->habilidad_ofrecida == $habilidad->id)
                            <h4>{{ $habilidad->titulo }}</h4>
                        @endif
                    @endforeach
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
