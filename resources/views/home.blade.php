<x-layout>
    <x-header />
    <section class="box">
        <form class="box__formulario" action="/home" method="post">
            @if (isset($habilidad) && !empty($habilidad))
                <input type="hidden" name="habilidad" value="{{ $habilidad }}">
            @endif
            @csrf
            <article class="box__formulario__article">
                <label class="box__formulario__article__label" for="ciudad">Ciudad</label>
                <input class="box__formulario__article__input" type="text" name="ciudad" id="ciudad"
                    value="{{ $busqueda['ciudad'] ?? '' }}" placeholder="Introduce la ciudad">
            </article>

            <article class="box__formulario__article">
                <label class="box__formulario__article__label" for="localidad">Localidad</label>
                <input class="box__formulario__article__input" type="text" name="localidad" id="localidad"
                    value="{{ $busqueda['localidad'] ?? '' }}" placeholder="Introduce la localidad">
            </article>

            <article class="box__formulario__article">
                <label class="box__formulario__article__label" for="palabra">Palabra clave</label>
                <input class="box__formulario__article__input" type="text" name="palabra" id="palabra"
                    value="{{ $busqueda['palabra'] ?? '' }}" placeholder="Introduce la palabra">
            </article>

            <article class="box__formulario__boton">
                <button class="box__formulario__boton--busquedad" type="submit"><i
                        class="fa-solid fa-magnifying-glass"></i></button>
            </article>
        </form>

        <section class="wrapper">
            <p class="flecha"><i class="fa-solid fa-chevron-left"></i></p>
                    <ul class="carousel">
                        @foreach ($habilidades as $habilidad)
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
                        @endforeach
                    </ul>
                    <p class="flecha" id="left"><i class="fa-solid fa-chevron-right"></i></p>
        </section>

            <form action="/home" method="post">
                @csrf
                <input type="hidden" name="eliminar" value="eliminar">
                <button type="submit">x</p></button>
            </form>

        @if (isset($resultados) && !empty($resultados))
            <section class="box__section">
                @foreach ($resultados as $anuncio)
                    <a class="box__section__enlace" href="/ver/{{ $anuncio->id }}">
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
                                            src="{{ asset('fotos/usuario_base.png') }}" alt="foto de perfil">
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
                    </a>
                @endforeach
            </section>
        @else
            <section class="box__section">
                @foreach ($anuncios as $anuncio)
                    <a class="box__section__enlace" href="/ver/{{ $anuncio->id }}">
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
                                            src="{{ asset($usuario->avatar) }}" alt="foto de perfil">
                                        <p>{{ $usuario->username }}</p>
                                    </article>
                                @endif
                            @endforeach
                        </header>

                        <section class="box__section__enlace__contenido">
                            <article class="box__section__enlace__contenido__article">
                                <h3 class="box__section__enlace__contenido__article__titulo">{{ $anuncio->titulo_of }}
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
                    </a>
                @endforeach
            </section>
        @endif
    </section>
    <script>
        const wrapper = document.querySelector(".wrapper");
        const carousel = document.querySelector(".carousel");
        const firstCardWidth = carousel.querySelector(".card").offsetWidth;
        const arrowBtns = document.querySelectorAll(".wrapper .flecha");
        const carouselChildrens = [...carousel.children];

        let isDragging = false,
            isAutoPlay = true,
            startX,
            startScrollLeft,
            timeoutId;

        // Get the number of cards that can fit in the carousel at once
        let cardPerView = Math.round(carousel.offsetWidth / firstCardWidth);

        // Insert copies of the last few cards to beginning of carousel for infinite scrolling
        carouselChildrens
            .slice(-cardPerView)
            .reverse()
            .forEach((card) => {
                carousel.insertAdjacentHTML("afterbegin", card.outerHTML);
            });

        // Insert copies of the first few cards to end of carousel for infinite scrolling
        carouselChildrens.slice(0, cardPerView).forEach((card) => {
            carousel.insertAdjacentHTML("beforeend", card.outerHTML);
        });

        // Scroll the carousel at appropriate postition to hide first few duplicate cards on Firefox
        carousel.classList.add("no-transition");
        carousel.scrollLeft = carousel.offsetWidth;
        carousel.classList.remove("no-transition");

        // Add event listeners for the arrow buttons to scroll the carousel left and right
        arrowBtns.forEach((btn) => {
            btn.addEventListener("click", () => {
                carousel.scrollLeft +=
                    btn.id == "left" ? -firstCardWidth : firstCardWidth;
            });
        });

        const dragStart = (e) => {
            isDragging = true;
            carousel.classList.add("dragging");
            // Records the initial cursor and scroll position of the carousel
            startX = e.pageX;
            startScrollLeft = carousel.scrollLeft;
        };

        const dragging = (e) => {
            if (!isDragging) return; // if isDragging is false return from here
            // Updates the scroll position of the carousel based on the cursor movement
            carousel.scrollLeft = startScrollLeft - (e.pageX - startX);
        };

        const dragStop = () => {
            isDragging = false;
            carousel.classList.remove("dragging");
        };

        const infiniteScroll = () => {
            // If the carousel is at the beginning, scroll to the end
            if (carousel.scrollLeft === 0) {
                carousel.classList.add("no-transition");
                carousel.scrollLeft = carousel.scrollWidth - 2 * carousel.offsetWidth;
                carousel.classList.remove("no-transition");
            }
            // If the carousel is at the end, scroll to the beginning
            else if (
                Math.ceil(carousel.scrollLeft) ===
                carousel.scrollWidth - carousel.offsetWidth
            ) {
                carousel.classList.add("no-transition");
                carousel.scrollLeft = carousel.offsetWidth;
                carousel.classList.remove("no-transition");
            }

            carousel.addEventListener("mousedown", dragStart);
            carousel.addEventListener("mousemove", dragging);
            document.addEventListener("mouseup", dragStop);
            carousel.addEventListener("scroll", infiniteScroll);
            wrapper.addEventListener("mouseenter", () => clearTimeout(timeoutId));
        };
    </script>
</x-layout>
