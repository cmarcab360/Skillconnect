<x-layout>
    <section class="conte">
        <form class="conte__formulario" action="/publicar" method="post">
            @csrf
            <article class="conte__formulario__article">
                
                <h2 class="conte__formulario__article__titulo">Servicio/habilidad que ofrece</h2>
                <article class="conte__formulario__article__datos">
                    <label class="conte__formulario__article__datos__label" for="titulo_of">Título descriptivo</label>
                    <input required class="conte__formulario__article__datos__input" type="text" name="titulo_of" id="titulo_of" value="{{ old('titulo_of') }}" placeholder="Titulo">
                    @error('titulo_of')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </article>

                <article class="conte__formulario__article__datos">
                    <label class="conte__formulario__article__datos__label" for="habilidad_ofrecida">Categoría del anuncio</label>
                    <select required class="conte__formulario__article__datos__input" name="habilidad_ofrecida" value="{{ old('habilidad_ofrecida') }}">
                        <option value="">Seleccionar</option>
                        @foreach ($habilidades as $habilidad)
                            <option value="{{ $habilidad->id }}">{{ $habilidad->titulo }}</option>
                        @endforeach
                    </select>
                    @error('habilidad_ofrecida')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </article>

                <article class="conte__formulario__article__datos">
                    <label class="conte__formulario__article__datos__label" for="descripcion_of">Descripción detallada que ofrece</label>
                    <textarea required class="conte__formulario__article__datos__input" type="text" name="descripcion_of" id="descripcion_of" placeholder="Introduce la descripción">{{ old('descripcion_of') }}</textarea>
                    @error('descripcion_of')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </article>

                <section class="conte__formulario__article__juntos">
                    <article class="conte__formulario__article__juntos__datos">
                        <label class="conte__formulario__article__juntos__datos___label" for="localidad">Localidad</label>
                        <input required class="conte__formulario__article__juntos__datos__input" type="text" value="{{ old('localidad') }}" name="localidad" id="localidad" placeholder="Localidad">
                        @error('localidad')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </article>

                    <article class="conte__formulario__article__juntos__datos">
                        <label class="conte__formulario__article__juntos__datos___label" for="ciudad">Ciudad</label>
                        <input required class="conte__formulario__article__juntos__datos__input" type="text" value="{{ old('ciudad') }}" name="ciudad" id="ciudad" placeholder="Ciudad">
                        @error('ciudad')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </article>
                </section>
            </article>

            <article class="conte__formulario__article">

                <h2 class="conte__formulario__article__titulo">Servicio/habilidad que busca</h2>
                <article class="conte__formulario__article__datos">
                    <label class="conte__formulario__article__datos__label" for="titulo_B">Título descriptivo</label>
                    <input required class="conte__formulario__article__datos__input" type="text" value="{{ old('titulo_B') }}" name="titulo_B" id="titulo_B" placeholder="Titulo">
                    @error('titulo_B')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </article>

                <article class="conte__formulario__article__datos">
                    <label class="conte__formulario__article__datos__label" for="habilidad_buscada">Categoría del anuncio</label>
                    <select  required class="conte__formulario__article__datos__input" value="{{ old('habilidad_buscada') }}" name="habilidad_buscada">
                        <option value="">Seleccionar</option>
                        @foreach ($habilidades as $habilidad)
                            <option value="{{ $habilidad->id }}">{{ $habilidad->titulo }}</option>
                        @endforeach
                    </select>
                    @error('habilidad_buscada')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </article>

                <article class="conte__formulario__article__datos">
                    <label class="conte__formulario__article__datos__label" for="descripcion_bus">Descripción detallada que ofrece</label>
                    <textarea required class="conte__formulario__article__datos__input" type="text" name="descripcion_bus" id="descripcion_bus" placeholder="Introduce la descripción">{{ old('descripcion_bus') }}</textarea>
                    @error('descripcion_bus')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </article>

            </article>

            <article class="conte__formulario__botones">
                <input class="conte__formulario__botones__boton" type="submit" value="Publicar" name="publicar">
                <input class="conte__formulario__botones__boton" type="reset" value="Cancelar" name="cancelar">
            </article>
        </form>
    </section>
</x-layout>
