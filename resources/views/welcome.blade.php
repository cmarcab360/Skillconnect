
    <!--Solo si eres un guest, se mostrará el botón de register y el Formulario de log in. Tbn podría ser if(! auth->check())-->
    @guest
    <section class= "wrapper">
            <h1 class="wrapper__title">Log In</h1>
            <form action="/" method="POST" class="wrapper__form" id="register-form">
                <!--Crea un campo hidden con un token para este usuario-->
                @csrf 
                <div class="wrapper__form__input">
                    <label for="email" class="wrapper__form__input__label">EMAIL</label>
                    <input type="email" name="email" id="email" value="{{old('email')}}" required class="wrapper__form__input__input">
                    @error('email')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
                <div class="wrapper__form__input">
                    <label for="password" class="wrapper__form__input__label">PASSWORD</label>
                    <input type="password" name="password" id="password" required class="wrapper__form__input__input">
                    @error('password')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
                <div class="wrapper__form__buttons">
                    <button class="wrapper__form__buttons__button wrapper__form__buttons__button--blue"><a href="/registro" class="wrapper__form__buttons__button__a">Sign Up</a></button>
                    <button type="submit" class="wrapper__form__buttons__button">Log In</button>
                </div>
            </form>
        </section>
    @endguest
