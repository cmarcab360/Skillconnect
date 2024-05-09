
    <section class= "wrapper">
        <h1 class="wrapper__title">Registro</h1>
        <form action="/registro" method="POST" class="wrapper__form" id="register-form">
            <!--Crea un campo hidden con un token para este usuario-->
            @csrf 
            <div class="wrapper__form__input">
                <label for="name" class="wrapper__form__input__label">NAME</label>
                <input type="text" name="name" id="name" value="{{old('name')/*Cuando se haya cometido un error en otro campo no tenga que volver a llenar este campo*/}}" required class="wrapper__form__input__input">
                @error('name')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="wrapper__form__input">
                <label for="username" class="wrapper__form__input__label">USERNAME</label>
                <input type="text" name="username" id="username" value="{{old('username')}}" required class="wrapper__form__input__input">
                @error('username')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
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
                <button type="submit" class="wrapper__form__buttons__button">Submit</button>
            </div>
        </form>
    </section>

