@if ($usuarioLogueado == $usuario->id)
    <a href="/anuncios">Anuncios</a>
@else
    <a href="/anuncios/{{ $usuario->id }}">Anuncios</a>
@endif
<p>Valoraciones</p>


<p>username: {{ $usuario->username }}</p>

@if ($media > 0)
    <p>Media: {{ $media }}</p>
@else
    <p>Sin valoraciones aún</p>
@endif


@if (!empty($valoraciones))
    @foreach ($valoraciones as $valoracion)
        <div>
            <p>Comentario: {{ $valoracion->comentario }}</p>
            <p>Calificacion: {{ $valoracion->calificacion }}</p>
        </div>
    @endforeach
@else
    ¡Aún no hay valoraciones!
@endif
