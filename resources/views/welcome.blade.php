<x-layoutPrincipal>
    @guest
        <section class="contenedor">
            <section class="contenedor__texto">
                <h3 class="contenedor__texto__titulo">¡Que bueno volver a verte en SkillConnect!</h3>
                <article class="contenedor__texto__separador"></article>
                <h3 class="contenedor__texto__subtitulo">Inicia sesión para acceder a tu cuenta.</h3>
            </section>
            <section class="contenedor__formulario">
                <form action="/" method="POST" id="register-form">
                    @csrf
                    <header class="contenedor__formulario__cabecera">
                        <h1 class="contenedor__formulario__cabecera__titulo">Iniciar sesión</h1>
                        <p>¿Aún no eres miembro?</p>
                        <a href="/registro">Registrate</a>
                    </header>
                    <article class="contenedor__formulario__article">
                        <label for="email">Email*</label>
                        <input class="contenedor__formulario__article__input" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email"
                            required>
                        @error('email')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </article>
                    <article class="contenedor__formulario__article">
                        <label for="password">Contraseña*</label>
                        <input class="contenedor__formulario__article__input" type="password" name="password" id="password" placeholder="Contraseña" required>
                        @error('password')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </article>

                    <section class="contenedor__formulario__footer">
                        <button class="contenedor__formulario__footer__boton--azul" type="submit">Iniciar Sesión</button>
                    </section>
                </form>
            </section>
        </section>
    @endguest
</x-layoutPrincipal>
