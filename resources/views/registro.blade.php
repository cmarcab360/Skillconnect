<x-layout>
    @guest
        <section class="caja">
            <section class="caja__texto">
                <h3 class="caja__texto__titulo">¡Unete a SkillConnect gratris!</h3>
                <article class="caja__texto__separador"></article>
                <h3 class="caja__texto__subtitulo"> Explora una variedad de experiencias enriquecedoras, desde aprender
                    nuevas habilidades hasta ofrecer tu
                    experiencia a otros miembros de la comunidad. Encuentra tu pasión y comparte tus conocimientos mientras
                    te conectas con personas que comparten intereses similares.</h3>

            </section>
            <section class="caja__formulario">
            <form action="/registro" method="POST" class="wrapper__form" id="register-form">
                @csrf
                <header class="caja__formulario__cabecera">
                    <h1 class="caja__formulario__cabecera__titulo">Registrate</h1>
                    <p>¿Ya eres miembro? <a href="/">Inicia Sesión</a></p>
                </header>
                <article class="caja__formulario__article">
                    <label for="name" class="wrapper__form__input__label">Nombre*</label>
                    <input class="caja__formulario__article__input" type="text" placeholder="Nombre" name="name" id="name" value="{{ old('name') }}"required>
                    @error('name')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </article>
                <article class="caja__formulario__article">
                    <label for="username" class="wrapper__form__input__label">Nombre de usuario*</label>
                    <input class="caja__formulario__article__input" type="text" placeholder="Nombre de usuario" name="username" id="username" value="{{ old('username') }}" required
                        class="wrapper__form__input__input">
                    @error('username')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </article>
                <article class="caja__formulario__article">
                    <label for="email" class="wrapper__form__input__label">Email*</label>
                    <input class="caja__formulario__article__input" type="email" placeholder="Email" name="email" id="email" value="{{ old('email') }}" required
                        class="wrapper__form__input__input">
                    @error('email')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </article>
                <article class="caja__formulario__article">
                    <label for="password" class="wrapper__form__input__label">Contraseña*</label>
                    <input class="caja__formulario__article__input" type="password" placeholder="Contraseña" name="password" id="password" required class="wrapper__form__input__input">
                    @error('password')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </article>

                <article class="caja__formulario__footer">
                    <button class="caja__formulario__footer__boton--azul" type="submit">Registrarse</button>
                </article>
            </form>
        </section>
        </section>
    @endguest
</x-layout>
