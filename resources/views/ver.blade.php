<x-layout>
   

    <section class="section">
        {{-- Anuncios --}}
        <section class="section__anuncio">
            <h1 class="section__anuncio__titulo">{{ $anuncio->titulo_of }}</h1>
            <p class="section__anuncio__direccion"><i class="fa-solid fa-location-dot"></i> {{ $anuncio->Ciudad }} ({{ $anuncio->Localidad }})</p>

            <article class="section__anuncio__article">
                <h2 class="section__anuncio__article__seccion">Ofrece:</h2>
                @foreach ($habilidades as $habilidad)
                    @if ($anuncio->habilidad_ofrecida == $habilidad->id)
                        <h3 class="section__anuncio__article__titulo">{{ $habilidad->titulo }}</h3>
                    @endif
                @endforeach
                <p class="section__anuncio__article__decripcion">{{ $anuncio->descripcion_of }}</p>
            </article>

            <article class="section__anuncio__article">
                <h2 class="section__anuncio__article__seccion">Busca:</h2>
                @foreach ($habilidades as $habilidad)
                    @if ($anuncio->habilidad_buscada == $habilidad->id)
                        <h3 class="section__anuncio__article__titulo">{{ $habilidad->titulo }}</h3>
                    @endif
                @endforeach
                <p class="section__anuncio__article__decripcion">{{ $anuncio->descripcion_Bus }}</p>
            </article>

            <p class="section__anuncio__info">Publicado el {{ $anuncio->created_at->format('d/m/Y') }}</p>
            
        </section>


        <aside class="section__aside">
            {{-- Datos de usuario --}}
            <section class="section__aside__usuario">
                <header class="section__aside__usuario__header">
                    <article class="section__aside__usuario__header__datos">
                        <img class="section__aside__usuario__header__datos__img" src="{{ $usuario->avatar }}" alt="Foto de usuario">
                        <form action="/anuncios" method="get">
                            <input type="hidden" name="id" value="{{ $usuario->id }}">
                            <input class="section__aside__usuario__header__datos__nombre" type="submit" value="{{ ucfirst($usuario->username) }}">
                        </form>
                    </article>
                    @if ($media == 0)
                        <p class="section__aside__usuario__header__valor"><i class="fa-solid fa-star"></i> Nuevo</p>
                    @else
                        <p class="section__aside__usuario__header__valor"><i class="fa-solid fa-star"></i> {{ $media }}</p>
                    @endif
                </header>

                <article>
                    @if ($usuario->id == $usuarioLog)
                        <button class="section__aside__usuario__boton"><i class="fa-solid fa-comment-dots"></i> Contactar</button>
                    @else
                        <button class="section__aside__usuario__boton"><a href="/mensajes/{{ $anuncio->id_usuario }}"><i class="fa-solid fa-comment-dots"></i> Contactar</a></button>
                    @endif
                </article>
            </section>

            {{-- Anuncios similares --}}
            <section class="section__aside__anuncios">
                <h1 class="section__aside__anuncios__titulo">Anuncios similares</h1>
                @foreach ($anunciosSimilares as $anuncio)
                    <form action="ver" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $anuncio->id }}">
                        <button class="section__aside__anuncios__anuncio" type="submit" class="box__section__enlace">
                            <header class="section__aside__anuncios__anuncio__header">
                                @foreach ($habilidades as $habilidad)
                                    @if ($anuncio->habilidad_ofrecida == $habilidad->id)
                                        <h3 class="section__aside__anuncios__anuncio__header__titulo">
                                            {{ $habilidad->titulo }}</h3>
                                    @endif
                                @endforeach
                            </header>
                            <article class="section__aside__anuncios__anuncio__contenido">
                                <h4 class="section__aside__anuncios__anuncio__contenido__titulo">
                                    {{ $anuncio->titulo_of }}</h4>
                                <p class="section__aside__anuncios__anuncio__contenido__descrip">
                                    {{ $anuncio->descripcion_of }}</p>
                            </article>
                            <article class="section__aside__anuncios__anuncio__contenido">
                                <h4 class="section__aside__anuncios__anuncio__contenido__titulo">
                                    {{ $anuncio->tituloB }}</h4>
                                <p class="section__aside__anuncios__anuncio__contenido__descrip">
                                    {{ $anuncio->descripcion_Bus }}</p>
                            </article>
                        </button>
                    </form>
                @endforeach
            </section>

        </aside>
    </section>
</x-layout>
