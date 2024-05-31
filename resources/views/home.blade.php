<x-layout>
    <section class="box">
        <!--Formulario de busquedad-->
        <form class="box__formulario" action="/home" method="post">
            @if (isset($habilidad) && !empty($habilidad))
                <input type="hidden" name="habilidad" value="{{ $habilidad }}">
            @endif
            @csrf
            <article class="box__formulario__article">
                <label class="box__formulario__article__label" for="ciudad">Ciudad</label>
                <input class="box__formulario__article__input" type="text" name="ciudad" id="ciudad" value="{{ $busqueda['ciudad'] ?? '' }}" placeholder="Introduce la ciudad">
            </article>

            <article class="box__formulario__article">
                <label class="box__formulario__article__label" for="localidad">Localidad</label>
                <input class="box__formulario__article__input" type="text" name="localidad" id="localidad" value="{{ $busqueda['localidad'] ?? '' }}" placeholder="Introduce la localidad">
            </article>

            <article class="box__formulario__article">
                <label class="box__formulario__article__label" for="palabra">Palabra clave</label>
                <input class="box__formulario__article__input" type="text" name="palabra" id="palabra" value="{{ $busqueda['palabra'] ?? '' }}" placeholder="Introduce la palabra">
            </article>

            <article class="box__formulario__boton">
                <button class="box__formulario__boton--busquedad" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </article>
        </form>

        <!--Slide de habilidades-->
        <section class="wrapper">
            <p class="flecha"><i class="fa-solid fa-chevron-left"></i></p>
            <ul class="carousel">
                @foreach ($habilidades as $habilidad)
                    @if (isset($habilidad_select) && $habilidad_select !== '')
                        @if ($habilidad_select == $habilidad->id)
                            <li class="card select">
                            @else
                            <li class="card">
                        @endif
                        <form action="/home" method="post">
                            @csrf
                            <input type="hidden" name="habilidad" value="{{ $habilidad->id }}">
                            <button class="img" type="submit">
                                <img class="box__section__iconos__icono__boton__img"
                                    src="{{ $habilidad->icono }}"alt="{{ $habilidad->titulo }}" />
                                <p class="texto">{{ $habilidad->titulo }}</p>
                            </button>
                        </form>
                        </li>
                    @else
                        <li class="card">
                            <form action="/home" method="post">
                                @csrf
                                <input type="hidden" name="habilidad" value="{{ $habilidad->id }}">
                                <button class="img" type="submit">
                                    <img class="box__section__iconos__icono__boton__img"
                                        src="{{ $habilidad->icono }}"alt="{{ $habilidad->titulo }}" />
                                    <p class="texto">{{ $habilidad->titulo }}</p>
                                </button>
                            </form>
                        </li>
                    @endif
                @endforeach
            </ul>
            <p class="flecha" id="left"><i class="fa-solid fa-chevron-right"></i></p>
        </section>

        <article class="box__article">
            <h1 class="box__article__titulo">Anuncios</h1>
            <!--Formulario para eliminar la busquedad-->
            <form action="/home" method="post">
                @csrf
                <input type="hidden" name="eliminar" value="eliminar">
                <button class="box__article__boton" type="submit"><i
                        class="fa-solid fa-filter-circle-xmark"></i></button>
            </form>
        </article>


        @if (isset($resultados))<!--Si hay anuncios con las caracteriticas buscada los muestra y si no da un mensaje-->
            @if ($resultados->isEmpty())
                <article class="box__contenedor">
                    <img class="box__contenedor__img" src="img/buscar.png" alt="sin resultados">
                    <p class="box__contenedor__texto">Parece que no hay resultados</p>
                </article>
            @else
                <section class="box__section">
                    @foreach ($resultados as $anuncio)
                        <form  action="ver" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $anuncio->id }}">
                            <button type="submit" class="box__section__enlace">

                                <header class="box__section__enlace__header">
                                    @foreach ($habilidades as $habilidad)
                                        @if ($anuncio->habilidad_ofrecida == $habilidad->id)
                                            <h4 class="box__section__enlace__header__titulo">{{ $habilidad->titulo }}
                                            </h4>
                                        @endif
                                    @endforeach
                                    @foreach ($usuarios as $usuario)
                                        @if ($usuario->id == $anuncio->id_usuario)
                                            <article class="box__section__enlace__header__usuario">
                                                <img class="box__section__enlace__header__usuario__img"
                                                src="/users-avatar/{{$usuario->avatar }}" alt="foto de perfil">
                                                <p>{{ $usuario->username }}</p>
                                            </article>
                                        @endif
                                    @endforeach
                                </header>

                                <section class="box__section__enlace__contenido">
                                    <article class="box__section__enlace__contenido__article">
                                        <h3 class="box__section__enlace__contenido__article__titulo">
                                            {{ $anuncio->titulo_of }}</h3>
                                        <p class="box__section__enlace__contenido__article__descripcion">
                                            {{ $anuncio->descripcion_of }}</p>
                                    </article>

                                    <article class="box__section__enlace__contenido__article">
                                        @foreach ($habilidades as $habilidad)
                                            @if ($anuncio->habilidad_buscada == $habilidad->id)
                                                <h3 class="box__section__enlace__contenido__article__titulo">
                                                    {{ $habilidad->titulo }}
                                                </h3>
                                            @endif
                                        @endforeach
                                        <p class="box__section__enlace__contenido__article__descripcion">
                                            {{ $anuncio->descripcion_Bus }}</p>
                                    </article>
                                </section>
                            </button>
                        </form>
                    @endforeach
                </section>
            @endif
        @else<!--Si no se ha buscado nada muestra los anucnios-->
            <section class="box__section">
                @foreach ($anuncios as $anuncio)
                    <form action="ver" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $anuncio->id }}">
                        <button type="submit" class="box__section__enlace">

                            <header class="box__section__enlace__header">
                                @foreach ($habilidades as $habilidad)
                                    @if ($anuncio->habilidad_ofrecida == $habilidad->id)
                                        <h4 class="box__section__enlace__header__titulo">{{ $habilidad->titulo }}</h4>
                                    @endif
                                @endforeach
                                @foreach ($usuarios as $usuario)
                                    @if ($usuario->id == $anuncio->id_usuario)
                                        <article class="box__section__enlace__header__usuario">
                                            <img class="box__section__enlace__header__usuario__img"
                                            src="/users-avatar/{{$usuario->avatar }}" alt="foto de perfil">
                                            <p>{{ $usuario->username }}</p>
                                        </article>
                                    @endif
                                @endforeach
                            </header>

                            <section class="box__section__enlace__contenido">
                                <article class="box__section__enlace__contenido__article">
                                    <h3 class="box__section__enlace__contenido__article__titulo">
                                        {{ $anuncio->titulo_of }}
                                    </h3>
                                    <p class="box__section__enlace__contenido__article__descripcion">
                                        {{ $anuncio->descripcion_of }}</p>
                                </article>

                                <article class="box__section__enlace__contenido__article">
                                    @foreach ($habilidades as $habilidad)
                                        @if ($anuncio->habilidad_buscada == $habilidad->id)
                                            <h3 class="box__section__enlace__contenido__article__titulo">
                                                {{ $habilidad->titulo }}
                                            </h3>
                                        @endif
                                    @endforeach
                                    <p class="box__section__enlace__contenido__article__descripcion">
                                        {{ $anuncio->descripcion_Bus }}</p>
                                </article>
                            </section>
                        </button>
                    </form>
                @endforeach
            </section>
        @endif
    </section>
</x-layout>
