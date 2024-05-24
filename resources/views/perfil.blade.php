<x-layout>
    <x-header />
    <section class="container">
        <article class="container__box">
            <form class="container__box__formulario" action="{{ route('perfil.update') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <section class="container__box__formulario__usuario">
                    <img class="container__box__formulario__usuario__img" src="{{ $usuario->avatar }}"
                        alt="foto de perfil">
                    <label class="container__box__formulario__usuario__label" for="url_foto">Subir foto
                        <input class="container__box__formulario__usuario__label__input" type="file" name="url_foto"
                            id="url_foto" placeholder="Seleccionar">
                        @error('url_foto')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </label>

                </section>

                <section class="container__box__formulario__datos">
                    <article class="container__box__formulario__datos__caja">
                        <label class="container__box__formulario__datos__caja__label" for="name">Nombre:</label>
                        <input class="container__box__formulario__datos__caja__input" type="text" name="name"
                            id="name" value="{{ $usuario->name }}">
                        @error('name')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </article>

                    <article class="container__box__formulario__datos__caja">
                        <label class="container__box__formulario__datos__caja__label" for="username">Nombre de usuario:</label>
                        <input class="container__box__formulario__datos__caja__input" type="text" name="username"
                            id="username" value="{{ $usuario->username }}">
                        @error('username')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </article>

                    <article class="container__box__formulario__datos__caja">
                        <label class="container__box__formulario__datos__caja__label" for="email">Email:</label>
                        <input class="container__box__formulario__datos__caja__input" type="email" name="email"
                            id="email" value="{{ $usuario->email }}">
                        @error('email')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </article>

                    <article class="container__box__formulario__datos__caja">
                        <label class="container__box__formulario__datos__caja__label" for="password">Contraseña:</label>
                        <input class="container__box__formulario__datos__caja__input" type="password" name="password"
                            id="password" value="contraseña">
                        @error('password')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </article>

                    <article class="container__box__formulario__datos__caja">
                        <label class="container__box__formulario__datos__caja__label" for="descripcion">Descripción:</label>
                        @if ($usuario->descripcion == null)
                            <textarea class="container__box__formulario__datos__caja__input" name="descripcion" id="descripcion" rows="4"
                                placeholder="Ingrese la descripcion" cols="35"></textarea>
                        @else
                            <textarea class="container__box__formulario__datos__caja__input" name="descripcion" id="descripcion" rows="4"
                                cols="35">{{ $usuario->descripcion }}</textarea>
                        @endif
                        @error('descripcion')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </article>

                </section>
                <article class="container__box__formulario__botones">
                    <input class="container__box__formulario__botones__boton" type="submit" name="guardar" value="Guardar">
                    <input class="container__box__formulario__botones__boton" type="reset" value="Cancelar">
                </article>

            </form>
        </article>

    </section>

</x-layout>
