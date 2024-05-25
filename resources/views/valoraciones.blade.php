<x-layout>
    <x-header />

    <section class="sec">
        <header class="sec__header">
            <article class="sec__header__usuario">
                <div class="sec__header__usuario__datos">
                    <img style="height: 50px; width: 50px" class="sec__header__usuario__datos__img" src="{{ $usuario->avatar }}" alt="Imagen usuario">
                    <p class="sec__header__usuario__datos__nombre">{{ ucfirst($usuario->username) }}</p>
                </div>
                 @if ($media > 0)
                    <p>Media: {{ $media }}</p>
                @else
                    <p>Sin valoraciones aún</p>
                @endif
                <p class="sec__header__usuario__datos__descrip">{{ $usuario->descripcion }}</p>
            </article>
            <nav class="sec__header__menu">
                <ul class="sec__header__menu__listado">
                    <li>
                        <form action="/anuncios" method="get">
                            @csrf
                            <input type="hidden" name="id" value="{{ $usuario->id }}">
                            <button type="submit">Anuncios</button>
                        </form>
                    <li class="sec__header__menu__listado--select">Valoraciones</li>
                    </li>
                </ul>
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
</x-layout>
