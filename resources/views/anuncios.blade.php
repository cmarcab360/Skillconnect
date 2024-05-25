<x-layout>
    <x-header />

    <section class="cont">
        <header class="cont__header">
            <article class="cont__header__usuario">
                <div class="cont__header__usuario__datos">
                    <img class="cont__header__usuario__datos__img" src="{{ $usuario->avatar }}" alt="Imagen usuario">
                    <p class="cont__header__usuario__datos__nombre">{{ ucfirst($usuario->username) }}</p>
                </div>
                <p class="cont__header__usuario__datos__descrip">{{ $usuario->descripcion }}</p>
            </article>
            <nav class="cont__header__menu">
                <ul class="cont__header__menu__listado">
                    <li class="cont__header__menu__listado--select">Anuncios</li>
                    <li>
                        <form action="/valoraciones" method="post">
                            @csrf
                            <input type="hidden" name="usuario" value="{{$id}}">
                            <button type="submit">Valoraciones</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </header>


        @if ($id == $usuarioLog)

            @if ($listadoAnuncios->isEmpty())
                <article class="cont__anuncios__article">
                    <img class="cont__anuncios__article__img" src="img/buscar.png" alt="Buscar">
                    <p class="cont__anuncios__article__txt">Aún no tienes ningún anuncio</p>
                    <a class="cont__anuncios__article__enlace" href="publicar"><i class="fa-solid fa-square-plus"></i>
                        Publicar</a>
                </article>
            @else
                <h1>Mis Anuncios ({{ $numAnuncios }})</h1>
                <section class="cont__anuncios">
                    <a href="publicar" class="cont__anuncios__anuncio agregar">
                        <h1 class="agregar__texto">Añadir un nuevo anuncio</h1>
                        <p class="agregar__texto"><i class="fa-solid fa-square-plus"></i></p>
                    </a>
                    @foreach ($listadoAnuncios as $anuncio)
                        <article class="cont__anuncios__anuncio">
                            <header class="cont__anuncios__anuncio__header">
                                @foreach ($habilidades as $habilidad)
                                    @if ($anuncio->habilidad_ofrecida == $habilidad->id)
                                        <h4 class="cont__anuncios__anuncio__header__titulo">{{ $habilidad->titulo }}
                                        </h4>
                                    @endif
                                @endforeach
                                <article class="cont__anuncios__anuncio__header__datos">
                                    <div class="cont__anuncios__anuncio__header__datos__usuario">
                                        <img class="cont__anuncios__anuncio__header__datos__usuario__img"
                                            src="{{ $usuario->avatar }}" alt="Imagen base">
                                        <p>{{ ucfirst($usuario->username) }}</p>
                                    </div>

                                    <article class="cont__anuncios__anuncio__header__datos__menu">
                                        <p class="cont__anuncios__anuncio__header__datos__menu__icono"><i
                                                class="fa-solid fa-bars"></i></p>
                                        <nav class="cont__anuncios__anuncio__header__datos__menu__contenido">
                                            <form action="{{ route('anuncios.delete', $anuncio->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <label
                                                    class="cont__anuncios__anuncio__header__datos__menu__contenido__enlace"><i
                                                        class="fa-solid fa-trash"></i> Eliminar
                                                    <input type="submit" value="Eliminar">
                                                </label>
                                            </form>
                                            <form action="editar" method="post">
                                                <input type="hidden" name="id" value="{{ $anuncio->id }}">
                                                @csrf
                                                <label
                                                    class="cont__anuncios__anuncio__header__datos__menu__contenido__enlace"><i
                                                        class="fa-regular fa-pen-to-square"></i> Editar
                                                    <input type="submit" value="Editar">
                                                </label>
                                            </form>


                                        </nav>
                                    </article>
                                </article>
                            </header>

                            <form action="ver" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $anuncio->id }}">
                                <button type="submit" class="cont__anuncios__anuncio">
                                    <section class="cont__anuncios__anuncio__contenido">
                                        <article class="cont__anuncios__anuncio__contenido__article">
                                            <h3 class="cont__anuncios__anuncio__contenido__article__titulo">
                                                {{ $anuncio->titulo_of }}</h3>
                                            <p class="cont__anuncios__anuncio__contenido__article__descrip">
                                                {{ $anuncio->descripcion_of }}</p>
                                        </article>
                                        <article class="cont__anuncios__anuncio__contenido__article">
                                            @foreach ($habilidades as $habilidad)
                                                @if ($anuncio->habilidad_buscada == $habilidad->id)
                                                    <h3 class="cont__anuncios__anuncio__contenido__article__titulo">
                                                        {{ $habilidad->titulo }}</h3>
                                                @endif
                                            @endforeach
                                            <p class="cont__anuncios__anuncio__contenido__article__descrip">
                                                {{ $anuncio->descripcion_Bus }}</p>
                                        </article>
                                    </section>
                                </button>
                            </form>
                        </article>
                    @endforeach
                </section>
            @endif
        @else
            <h2>Anuncios activos ({{ $numAnuncios }})</h2>
            <section class="cont__anuncios">
                @foreach ($listadoAnuncios as $anuncio)
                <article class="cont__anuncios__anuncio">
                    <form action="ver" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $anuncio->id }}">
                        <button type="submit" class="cont__anuncios__anuncio">
                        
                        
                            <header class="cont__anuncios__anuncio__header">
                                @foreach ($habilidades as $habilidad)
                                    @if ($anuncio->habilidad_ofrecida == $habilidad->id)
                                        <h4 class="cont__anuncios__anuncio__header__titulo">{{ $habilidad->titulo }}
                                        </h4>
                                    @endif
                                @endforeach
                                <article class="cont__anuncios__anuncio__header__datos">
                                    <div class="cont__anuncios__anuncio__header__datos__usuario">
                                        <img class="cont__anuncios__anuncio__header__datos__usuario__img"
                                            src="{{ $usuario->avatar }}" alt="Imagen base">
                                        <p>{{ ucfirst($usuario->username) }}</p>
                                    </div>
                                </article>
                            </header>

                            <section class="cont__anuncios__anuncio__contenido">
                                <article class="cont__anuncios__anuncio__contenido__article">
                                    <h3 class="cont__anuncios__anuncio__contenido__article__titulo">
                                        {{ $anuncio->titulo_of }}</h3>
                                    <p class="cont__anuncios__anuncio__contenido__article__descrip">
                                        {{ $anuncio->descripcion_of }}</p>
                                </article>
                                <article class="cont__anuncios__anuncio__contenido__article">
                                    @foreach ($habilidades as $habilidad)
                                        @if ($anuncio->habilidad_buscada == $habilidad->id)
                                            <h3 class="cont__anuncios__anuncio__contenido__article__titulo">
                                                {{ $habilidad->titulo }}</h3>
                                        @endif
                                    @endforeach
                                    <p class="cont__anuncios__anuncio__contenido__article__descrip">
                                        {{ $anuncio->descripcion_Bus }}</p>
                                </article>
                            </section>
                            </button>
                        </form>
                    </article>
                @endforeach
            </section>

        @endif



    </section>

</x-layout>
