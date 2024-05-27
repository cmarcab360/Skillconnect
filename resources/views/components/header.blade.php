<header class="header">
    @auth  <!--Solo se muestra a usuarios logueados-->
    <picture class="header__picture">
        <source media="(min-width: 700px)" srcset="/img/logo.png">
        <img src="/img/logo.png" alt="Logo SkillConnect" class="header__picture__logo">
    </picture>
    <div class="header__options">
        <!--index-->
        <a class="header__options__enlace" href="/home"><i class="fa-solid fa-house"></i></a>
        <!--Mensajes-->
        <a class="header__options__enlace" href="mensajes"><i class="fa-solid fa-envelope"></i></a>
        <!--Agregar anuncio-->
        <a class="header__options__enlace--bordeBlancos" href="publicar"><i class="fa-solid fa-square-plus"></i> Publicar</a>

        <!--Datos Usuario-->
        <section class="header__options__user">
            <img class="header__options__user__img" src="{{ auth()->user()->avatar }}" alt="imagen usuario">
            <nav class="header__options__user__menu">
                <p class="header__options__user__menu__icono"><i class="fa-solid fa-chevron-down"></i></p>
                <section class="header__options__user__menu__contenido">
                    <header class="header__options__user__menu__contenido__cabecera">
                        <p class="header__options__user__menu__contenido__cabecera__texto">{{ ucfirst(auth()->user()->name) }}</p>
                    </header>
                     <!--Anuncios-->
                    <a href="/anuncios"><i class="fa-solid fa-bullhorn"></i> Mis anuncios</a>
    
                     <!--Perfil-->
                    <a href="/perfil"><i class="fa-solid fa-gear"></i> Perfil</a>
                    
                    <!--Logout-->
                    <a href="/logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar sesion</a>
                </section>
            </nav>
        </section>
    </div>
    @endauth
</header>
