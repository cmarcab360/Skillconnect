<x-layout>
    <section class="conte">
        <form class="conte__formulario" action="/publicar" method="post">
            @csrf
            <article class="conte__formulario__article">
                
                <h2 class="conte__formulario__article__titulo">Servicio/habilidad que ofrece</h2>
                <article class="conte__formulario__article__datos">
                    <label class="conte__formulario__article__datos__label" for="titulo_of">Título descriptivo</label>
                    <input class="conte__formulario__article__datos__input" type="text" name="titulo_of" id="titulo_of" placeholder="Titulo">
                </article>

                <article class="conte__formulario__article__datos">
                    <label class="conte__formulario__article__datos__label" for="habilidad_ofrecida">Categoría del anuncio</label>
                    <select class="conte__formulario__article__datos__input" name="habilidad_ofrecida">
                        <option value="">Seleccionar</option>
                        @foreach ($habilidades as $habilidad)
                            <option value="{{ $habilidad->id }}">{{ $habilidad->titulo }}</option>
                        @endforeach
                    </select>
                </article>

                <article class="conte__formulario__article__datos">
                    <label class="conte__formulario__article__datos__label" for="descripcion_of">Descripción detallada que ofrece</label>
                    <textarea class="conte__formulario__article__datos__input" type="text" name="descripcion_of" id="descripcion_of" placeholder="Introduce la descripción"></textarea>
                </article>

                <section class="conte__formulario__article__juntos">
                    <article class="conte__formulario__article__juntos__datos">
                        <label class="conte__formulario__article__juntos__datos___label" for="localidad">Localidad</label>
                        <input class="conte__formulario__article__juntos__datos__input" type="text" name="localidad" id="localidad" placeholder="Localidad">
                    </article>

                    <article class="conte__formulario__article__juntos__datos">
                        <label class="conte__formulario__article__juntos__datos___label" for="ciudad">Ciudad</label>
                        <input class="conte__formulario__article__juntos__datos__input" type="text" name="ciudad" id="ciudad" placeholder="Ciudad">
                    </article>
                </section>
            </article>

            <article class="conte__formulario__article">

                <h2 class="conte__formulario__article__titulo">Servicio/habilidad que busca</h2>
                <article class="conte__formulario__article__datos">
                    <label class="conte__formulario__article__datos__label" for="titulo_B">Título descriptivo</label>
                    <input class="conte__formulario__article__datos__input" type="text" name="titulo_B"
                        id="titulo_B" placeholder="Titulo">
                </article>

                <article class="conte__formulario__article__datos">
                    <label class="conte__formulario__article__datos__label" for="habilidad_buscada">Categoría delanuncio</label>
                    <select  class="conte__formulario__article__datos__input" name="habilidad_buscada">
                        <option value="">Seleccionar</option>
                        @foreach ($habilidades as $habilidad)
                            <option value="{{ $habilidad->id }}">{{ $habilidad->titulo }}</option>
                        @endforeach
                    </select>
                </article>

                <article class="conte__formulario__article__datos">
                    <label class="conte__formulario__article__datos__label" for="descripcion_bus">Descripción detallada que ofrece</label>
                    <textarea class="conte__formulario__article__datos__input" type="text" name="descripcion_bus" id="descripcion_bus" placeholder="Introduce la descripción"></textarea>
                </article>

            </article>

            <article class="conte__formulario__botones">
                <input class="conte__formulario__botones__boton" type="submit" value="Publicar" name="publicar">
                <input class="conte__formulario__botones__boton" type="reset" value="Cancelar" name="cancelar">
            </article>
        </form>
    </section>
</x-layout>
