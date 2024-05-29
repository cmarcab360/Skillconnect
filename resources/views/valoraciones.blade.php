<x-layout>
    <!--Dialog para valoracion-->
    <dialog id="modal" class="modal">
        <article class="modal__contenido">
            <p class="modal__contenido__boton" id="cerrar"><i class="fa-solid fa-x"></i></p>
            <form class="modal__contenido__formulario" action="/valorar" method="GET">
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
                <textarea required name="comentario" id="comentario" cols="25" rows="4"></textarea>

                <input class="modal__contenido__formulario__boton" type="submit" name="valorar" value="Enviar">
            </form>

        </article>
    </dialog>


    <section class="conte">
        <!--Datos del usuario-->
        <header class="conte__header">
            <article class="conte__header__usuario">
                <div class="conte__header__usuario__datos">
                    <img class="conte__header__usuario__datos__img" src="{{ $usuario->avatar }}" alt="Imagen usuario">
                    <article class="conte__header__usuario__datos__texto">
                        <p class="conte__header__usuario__datos__texto__nombre">{{ ucfirst($usuario->username) }}</p>
                        @if ($media > 0)
                            <p class="conte__header__usuario__datos__texto__media"><i class="fa-solid fa-star"></i>
                                {{ $media }}</p>
                        @else
                            <p class="conte__header__usuario__datos__texto__media"><i class="fa-solid fa-star"></i> Sin
                                valoraciones aún</p>
                        @endif
                    </article>
                </div>
                <p class="conte__header__usuario__datos__descrip">{{ $usuario->descripcion }}</p>
            </article>
            <nav class="conte__header__menu">
                <!--Menu de navegacion-->
                <ul class="conte__header__menu__listado">
                    <li>
                        <form action="/anuncios" method="get">
                            @csrf
                            <input type="hidden" name="id" value="{{ $usuario->id }}">
                            <button class="conte__header__menu__listado__enlace" type="submit">Anuncios</button>
                        </form>
                    <li class="conte__header__menu__listado--select">Valoraciones</li>
                    </li>
                </ul>
                @if ($usuario->id !== $usuarioLogueado)
                    <p class="conte__header__menu__boton" id="btnOpen">Agregar valoración</p>
                @endif
            </nav>
        </header>

        <section class="conte__titulo">
            <h2 >Valoraciones ({{ count($valoraciones) }})</h2>
        </section>
        <section class="conte__section">
            @if  (!$valoraciones->isEmpty())<!--Listado de valoraciones-->
                @foreach ($valoraciones as $valoracion)
                    <article class="conte__section__valoracion">
                        @foreach ($usuarios as $usuario)
                            @if ($usuario->id == $valoracion->id_usuario_evaluador)
                                <p class="conte__section__valoracion__nombre">{{ ucfirst($usuario->username) }}</p>
                            @endif
                        @endforeach
                        @if ($valoracion->calificacion == 5)
                            <section class="conte__section__valoracion__estrellas">
                                @for ($i = 0; $i < $valoracion->calificacion; $i++)
                                    <p class="conte__section__valoracion__estrellas__estrella"><i class="fa-solid fa-star"></i></p>
                                @endfor
                            </section>
                        @else
                            <section class="conte__section__valoracion__estrellas">
                                @for ($i = 0; $i < $valoracion->calificacion; $i++)
                                    <p class="conte__section__valoracion__estrellas__estrella"><i
                                            class="fa-solid fa-star"></i></p>
                                @endfor

                                @for ($i = $valoracion->calificacion; $i < 5; $i++)
                                    <p class="conte__section__valoracion__estrellas__estrella"><i class="fa-regular fa-star"></i></p>
                                @endfor
                                
                               
                            </section>
                        @endif
                        <p class="conte__section__valoracion__coment">{{ $valoracion->comentario }}</p>
                        <p class="conte__section__valoracion__fech">Publicado el
                            {{ $valoracion->created_at->format('d/m/Y') }}</p>
                    </article>
                @endforeach
            @else<!--Si esta vacion muestra un mensaje-->
                <section class="conte__section__info">
                    <p>Aún no hay valoraciones</p>
                </section>

            @endif
                
        </section>
    </section>  

    <script>
       
    </script>
</x-layout>
