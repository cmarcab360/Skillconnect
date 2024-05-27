<x-layout>
    <x-header />

    <section class="cont">
        <header class="cont__header">
            <article class="cont__header__usuario">
                <div class="cont__header__usuario__datos">
                    <img class="cont__header__usuario__datos__img" src="{{ $usuario->avatar }}" alt="Imagen usuario">
                    <article>
                        <p class="cont__header__usuario__datos__nombre">{{ ucfirst($usuario->username) }}</p>
                        @if ($media > 0)
                            <p><i class="fa-solid fa-star"></i> {{ $media }}</p>
                        @else
                            <p><i class="fa-solid fa-star"></i> Sin valoraciones aún</p>
                        @endif
                    </article>
                </div>
                <p class="cont__header__usuario__datos__descrip">{{ $usuario->descripcion }}</p>
            </article>
            <nav class="cont__header__menu">
                <ul class="cont__header__menu__listado">
                    <li>
                        <form action="/anuncios" method="get">
                            @csrf
                            <input type="hidden" name="id" value="{{ $usuario->id }}">
                            <button type="submit">Anuncios</button>
                        </form>
                    <li class="sec__header__menu__listado--select">Valoraciones</li>
                    </li>
                </ul>
                @if ($usuario->id !== $usuarioLogueado)
                    <p class="wrapper__header__menu__boton" id="btnOpen">Agregar valoración</p>
                @endif
            </nav>
        </header>








        <h2>Valoraciones ({{ count($valoraciones) }})</h2>
        @if (!empty($valoraciones))
            @foreach ($valoraciones as $valoracion)
                <section>
                    @foreach ($usuarios as $usuario)
                        @if ($usuario->id == $valoracion->id_usuario_evaluador)
                            <p>{{ $usuario->username }}</p>
                        @endif
                    @endforeach
                    <p>{{ $valoracion->calificacion }}</p>
                    <p>{{ $valoracion->comentario }}</p>

                    <p>Publicado el {{ $valoracion->created_at }}</p>
                </section>
            @endforeach
        @else
            ¡Aún no hay valoraciones!
        @endif

    </section>

    <dialog id="modal" class="modal">
        <article class="modal__contenido">
            <p class="modal__contenido__boton" id="cerrar"><i class="fa-solid fa-x"></i></p>

            <form class="modal__contenido__formulario" action="/valorar" method="get">
                @csrf
                <input type="hidden" name="id" value="{{ $usuario->id }}">
                <label for="calificacion">Puntuación:</label>
                <section class="estrellas">
                    <article class="raiting">
                        <input type="radio" name="calificacion" value="5">
                        <input type="radio" name="calificacion" value="4">
                        <input type="radio" name="calificacion" value="3">
                        <input type="radio" name="calificacion" value="2">
                        <input type="radio" name="calificacion" value="1">
                    </article>
                </section>
                <label for="comentario">Comentario:</label>
                <textarea name="comentario" id="comentario" cols="25" rows="4"></textarea>

                <input class="modal__contenido__formulario__boton" type="submit" name="valorar" value="Enviar">
            </form>

        </article>
    </dialog>

    <script>
        window.onload = iniciar;

        function iniciar() {
            const modal = document.getElementById("modal");
            document.getElementById("btnOpen").addEventListener("click", abrir);
            document.getElementById("cerrar").addEventListener("click", cerrar);

        }

        // Mostrar el modal al hacer clic en el botón
        abrir

        function abrir() {
            modal.showModal();
        }

        // Cerrar el modal al hacer clic en el botón de cerrar (x)

        function cerrar() {
            modal.close();
        }
    </script>
</x-layout>
