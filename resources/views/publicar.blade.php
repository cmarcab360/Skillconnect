<h1>Crear Anuncio</h1>

<form action="/publicar" method="post">


    @csrf
    <input type="hidden" name="id_usuario" id="id_usuario" value="{{ $userId }}">
    <h2>Servicio/habilidad que ofrece</h2>
    <label for="titulo_of">Titulo descriptivo</label>
    <input type="text" name="titulo_of" id="titulo_of" placeholder="Titulo"><br>

    <br><label for="habilidad_ofrecida">Categoria del anuncio</label>
    <select name="habilidad_ofrecida">
        <option value="">Seleccionar</option>
        @foreach ($habilidades as $habilidad)
            <option value="{{ $habilidad->id }}">{{ $habilidad->titulo }}</option>
        @endforeach        
    </select>


    <br><label for="descripcion_of">Descripcion detallada que ofrece</label>
    <textarea type="text" name="descripcion_of" id="descripcion_of" placeholder="Introdece la descriocion"></textarea><br>

    <br><label for="localidad">Localidad</label>
    <input type="text" name="localidad" id="localidad" placeholder="Introuce la localidad"><br>

    <br><label for="ciudad">Ciudad</label>
    <input type="text" name="ciudad" id="ciudad" placeholder="Introduce tu ciudad"><br>

    <h2>Servicio/habilidad que busca</h2>
    <label for="titulo_B">Titulo descriptivo</label>
    <input type="text" name="titulo_B" id="titulo_B" placeholder="Titulo"><br>

    <br><label for="habilidad_buscada">Categoria del anuncio</label>
    <select name="habilidad_buscada">
        <option value="">Seleccionar</option>
        @foreach ($habilidades as $habilidad)
            <option value="{{ $habilidad->id }}">{{ $habilidad->titulo }}</option>
        @endforeach        
    </select>

    <br><label for="descripcion_bus">Descripcion detallada que ofrece</label>
    <textarea type="text" name="descripcion_bus" id="descripcion_bus" placeholder="Introdece la descriocion"></textarea><br>

    <input type="submit" value="Publicar" name="publicar">
    <input type="reset" value="Cancelar" name="cancelar">
</form>
