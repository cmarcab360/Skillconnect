@if ($usuarioLogueado == $usuario->id)
    <a href="/anuncios">Anuncios</a>
@else
    <a href="/anuncios/{{ $usuario->id }}">Anuncios</a>
@endif
<p>Valoraciones</p>

<p><img src="{{ asset('fotos/usuario_base.png') }}" alt="Imagen base"
    style="height: 50px; width: 50px;">{{ $usuario->username }}</p>
@if ($media > 0)
    <p>Media: {{ $media }}</p>
@else
    <p>Sin valoraciones aún</p>
@endif

<h2>Valoraciones ({{count($valoraciones)}})</h2>
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
