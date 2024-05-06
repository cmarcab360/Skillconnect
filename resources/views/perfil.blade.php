<h1>Mi perfil:</h1>
<p>"{{ $userId }}"</p>

<form action="{{ route('perfil.update') }}" method="POST">
    @csrf

    <br><label for="nombre">Nombre:</label><br>
    <input type="text" name="nombre" id="nombre" value="{{ $usuario->nombre }}"><br>

    <br><label for="username">Nombre de usuario:</label><br>
    <input type="text" name="username" id="username" value="{{ $usuario->username }}"><br>

    <br><label for="email">Email:</label><br>
    <input type="email" name="email" id="email" value="{{ $usuario->email }}"><br>

    <br><label for="password">Contraseña:</label><br>
    <input type="password" name="password" id="password" value="{{ $usuario->password }}"><br>

    <br> <label for="descripcion">Descripción:</label><br>
    @if ($usuario->descripcion == null)
        <textarea name="descripcion" id="descripcion" rows="4" placeholder="Ingrese la descripcion" cols="35"></textarea><br>
    @else
        <textarea name="descripcion" id="descripcion" rows="4" cols="35">{{ $usuario->descripcion }}</textarea><br>
    @endif
    <br> <label for="ciudad">Ciudad:</label><br>
    @if ($usuario->descripcion == null)
        <input type="text" name="ciudad" id="ciudad" placeholder="Ingrese la ciudad"><br>
    @else
        <input type="text" name="ciudad" id="ciudad" placeholder="Ingrese la ciudad"
            value="{{ $usuario->ciudad }}"><br>
    @endif
    <br> <label for="localidad">Localidad:</label><br>
    @if ($usuario->descripcion == null)
        <input type="text" name="localidad" id="localidad" placeholder="Ingrese la localidad"><br>
    @else
        <input type="text" name="localidad" id="localidad" placeholder="Ingrese la localidad"
            value="{{ $usuario->ciudad }}"><br>
    @endif

    <br><input type="submit" name="guardar" value="Guardar">
    <input type="reset" value="Cancelar">
</form>
