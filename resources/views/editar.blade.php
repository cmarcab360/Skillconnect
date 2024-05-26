<x-layout>
    <x-header />
    <section class="sect">
        <h1 class="sect__titulo">Editar Anuncio</h1>

        <form class="sect__form" action="editar" method="post">
            @csrf
            <input type="hidden" name="id_anuncio" value="{{ $anuncios->id }}">

            <section class="sect__form__section">
                <article class="sect__form__section__article">
                    <h2 class="sect__form__section__article__titulo">Servicio/habilidad que ofrece</h2>

                    <article class="sect__form__section__article__datos">
                        <label class="sect__form__section__article__datos__label" for="titulo_of">Titulo descriptivo</label>
                        <input class="sect__form__section__article__datos__input" type="text" name="titulo_of" id="titulo_of" placeholder="Titulo" value="{{ $anuncios->titulo_of }}">
                    </article>

                    <article class="sect__form__section__article__datos">
                        <label class="sect__form__section__article__datos__label" for="habilidad_ofrecida">Categoria del anuncio</label>
                        <select class="sect__form__section__article__datos__input--select" name="habilidad_ofrecida">
                            @foreach ($habilidades as $habilidad)
                                @if ($habilidad->id == $anuncios->habilidad_ofrecida)
                                    <option value="{{ $habilidad->id }}" selected>{{ $habilidad->titulo }}</option>
                                @else
                                    <option value="{{ $habilidad->id }}">{{ $habilidad->titulo }}</option>
                                @endif
                            @endforeach
                        </select>
                    </article>

                    <article class="sect__form__section__article__datos">
                        <label class="sect__form__section__article__datos__label" for="descripcion_of">Descripcion detallada que ofrece</label>
                        <textarea class="sect__form__section__article__datos__input" type="text" name="descripcion_of" id="descripcion_of" placeholder="Introdece la descripcion">{{ $anuncios->descripcion_of }}</textarea>
                    </article>

                    <section class="sect__form__section__article__datos__juntos">
                        <article class="sect__form__section__article__datos__juntos__info">
                            <label class="sect__form__section__article__datos__juntos__info__label" for="localidad">Localidad</label>
                            <input class="sect__form__section__article__datos__juntos__info__input" type="text" name="localidad"
                                id="localidad" placeholder="Introuce la localidad" value="{{ $anuncios->Localidad }}">
                        </article>

                        <article class="sect__form__section__article__datos__juntos__info">
                            <label class="sect__form__section__article__datos__juntos__info__label" for="ciudad">Ciudad</label>
                            <input class="sect__form__section__article__datos__juntos__info__input" type="text" name="ciudad" id="ciudad" placeholder="Introduce tu ciudad" value="{{ $anuncios->Ciudad }}">
                        </article>

                    </section>
                </article>

                <article class="sect__form__section__article">
                    <h2 class="sect__form__section__article__titulo">Servicio/habilidad que busca</h2>

                    <article class="sect__form__section__article__datos">
                        <label class="sect__form__section__article__datos__label" for="titulo_B">Titulo descriptivo</label>
                        <input class="sect__form__section__article__datos__input" type="text" name="titulo_B" id="titulo_B" placeholder="Titulo"
                            value="{{ $anuncios->tituloB }}">
                    </article>

                    <article class="sect__form__section__article__datos">
                        <label class="sect__form__section__article__datos__label" for="habilidad_buscada">Categoria del anuncio</label>
                        <select class="sect__form__section__article__datos__input--select" name="habilidad_buscada">
                            @foreach ($habilidades as $habilidad)
                                @if ($habilidad->id == $anuncios->habilidad_buscada)
                                    <option value="{{ $habilidad->id }}" selected>{{ $habilidad->titulo }}</option>
                                @else
                                    <option value="{{ $habilidad->id }}">{{ $habilidad->titulo }}</option>
                                @endif
                            @endforeach
                        </select>
                    </article>

                    <article class="sect__form__section__article__datos">
                        <label class="sect__form__section__article__datos__label" for="descripcion_bus">Descripcion detallada que ofrece</label>
                        <textarea class="sect__form__section__article__datos__input" class="sect__form__section__article__label" type="text" name="descripcion_bus" id="descripcion_bus" placeholder="Introdece la descriocion">{{ $anuncios->descripcion_Bus }}</textarea>
                    </article>

                </article>
            </section>

            <article class="sect__form__botones">
                <input class="sect__form__botones__boton" type="submit" value="Guardar" name="guardar">
                <input class="sect__form__botones__boton" type="reset" value="Cancelar" name="cancelar">
            </article>
        </form>

    </section>
</x-layout>
