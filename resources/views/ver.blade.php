<h1>{{ $anuncio->titulo_of }}</h1>
<p>{{ $anuncio->Ciudad }}({{ $anuncio->Localidad }})</p>

<h2>Ofrece:</h2>
@foreach ($habilidades as $habilidad)
    @if ($anuncio->habilidad_ofrecida == $habilidad->id)
        <h3>{{ $habilidad->titulo }}</h3>
    @endif
@endforeach

<p>{{ $anuncio->descripcion_of }}</p>

<h2>Busca:</h2>
@foreach ($habilidades as $habilidad)
    @if ($anuncio->habilidad_buscada == $habilidad->id)
        <h3>{{ $habilidad->titulo }}</h3>
    @endif
@endforeach
<p>{{ $anuncio->descripcion_Bus }}</p>


<p>Publicado el {{ $anuncio->created_at }}</p>

<h1>datos de usuario</h1>

<p>{{$usuario->username}}</p>
<p>media de estrellas</p>
<button><a href="/mensajes/{{$anuncio->id_usuario}}/{{$anuncio->id}}">contactar</a></button>

<h1>Anuncios similares</h1>
@foreach ($anunciosSimilares as $anuncio)
    <h1>{{ $anuncio->habilidad_ofrecida }}</h1>
    <h4>{{ $anuncio->titulo_of }}</h4>
    <p>{{ $anuncio->descripcion_of }}</p>
@endforeach
