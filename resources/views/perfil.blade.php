<h1>Mi perfil:</h1>

<form action="{{ route('perfil.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($usuario->avatar == null)
        <img src="{{ asset('fotos/usuario_base.png') }}" alt="Imagen base">
    @else
        <img src="{{ $usuario->avatar }}" alt="foto de perfil">
    @endif

    <label for="url_foto">Foto:</label><br>
    <input type="file" name="url_foto" id="url_foto" placeholder="Ingrese la ciudad"
        value="{{ asset('storage/app/' . $usuario->url_foto) }}"><br>
    @error('url_foto')
        <p class="error">{{ $message }}</p>
    @enderror

    <br><label for="name">Nombre:</label><br>
    <input type="text" name="name" id="name" value="{{ $usuario->name }}"><br>
    @error('name')
        <p class="error">{{ $message }}</p>
    @enderror

    <br><label for="username">Nombre de usuario:</label><br>
    <input type="text" name="username" id="username" value="{{ $usuario->username }}"><br>
    @error('username')
        <p class="error">{{ $message }}</p>
    @enderror

    <br><label for="email">Email:</label><br>
    <input type="email" name="email" id="email" value="{{ $usuario->email }}"><br>
    @error('email')
        <p class="error">{{ $message }}</p>
    @enderror

    <br><label for="password">Contraseña:</label><br>
    <input type="password" name="password" id="password" value="contraseña"><br>
    @error('password')
        <p class="error">{{ $message }}</p>
    @enderror

    <br> <label for="descripcion">Descripción:</label><br>
    @if ($usuario->descripcion == null)
        <textarea name="descripcion" id="descripcion" rows="4" placeholder="Ingrese la descripcion" cols="35"></textarea><br>
    @else
        <textarea name="descripcion" id="descripcion" rows="4" cols="35">{{ $usuario->descripcion }}</textarea><br>
    @endif
    @error('descripcion')
        <p class="error">{{ $message }}</p>
    @enderror


    <br><input type="submit" name="guardar" value="Guardar">
    <input type="reset" value="Cancelar">
</form>
