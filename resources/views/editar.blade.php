<h1>Editar Anuncio</h1>

    <form action="{{ route('anuncios.editar', $anuncios->id) }}" method="post">
        @csrf
        @method('PUT')
        <h2>Servicio/habilidad que ofrece</h2>
        <label for="titulo_of">Titulo descriptivo</label>
        <input type="text" name="titulo_of" id="titulo_of" placeholder="Titulo" value="{{ $anuncios->titulo_of }}"><br>

        <br><label for="habilidad_ofrecida">Categoria del anuncio</label>
        <select name="habilidad_ofrecida">
            @foreach ($habilidades as $habilidad)
                @if ($habilidad->id == $anuncios->habilidad_ofrecida)
                    <option value="{{ $habilidad->id }}" selected>{{ $habilidad->titulo }}</option>
                @else
                    <option value="{{ $habilidad->id }}">{{ $habilidad->titulo }}</option>
                @endif
            @endforeach
        </select>


        <br><label for="descripcion_of">Descripcion detallada que ofrece</label>
        <textarea type="text" name="descripcion_of" id="descripcion_of" placeholder="Introdece la descripcion">{{ $anuncios->descripcion_of }}</textarea><br>

        <br><label for="localidad">Localidad</label>
        <input type="text" name="localidad" id="localidad" placeholder="Introuce la localidad"
            value="{{ $anuncios->Localidad }}"><br>

        <br><label for="ciudad">Ciudad</label>
        <input type="text" name="ciudad" id="ciudad" placeholder="Introduce tu ciudad"
            value="{{ $anuncios->Ciudad }}"><br>

        <h2>Servicio/habilidad que busca</h2>
        <label for="titulo_B">Titulo descriptivo</label>
        <input type="text" name="titulo_B" id="titulo_B" placeholder="Titulo" value="{{ $anuncios->tituloB }}"><br>

        <br><label for="habilidad_buscada">Categoria del anuncio</label>
        <select name="habilidad_buscada">
            @foreach ($habilidades as $habilidad)
                @if ($habilidad->id == $anuncios->habilidad_buscada)
                    <option value="{{ $habilidad->id }}" selected>{{ $habilidad->titulo }}</option>
                @else
                    <option value="{{ $habilidad->id }}">{{ $habilidad->titulo }}</option>
                @endif
            @endforeach
        </select>

        <br><label for="descripcion_bus">Descripcion detallada que ofrece</label>
        <textarea type="text" name="descripcion_bus" id="descripcion_bus" placeholder="Introdece la descriocion">{{ $anuncios->descripcion_Bus }}</textarea><br>

        <input type="submit" value="Guardar" name="guardar">
        <input type="reset" value="Cancelar" name="cancelar">
    </form>

