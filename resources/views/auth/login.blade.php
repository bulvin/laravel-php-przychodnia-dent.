<!doctype html>
<html lang="pl">

@include('shared.header')

<body>
    @include('shared.nav')

    <div id="..." class="container mt-3 mb-5">
        <div class="mt-4 mb-4">
            <div class="row">
                <h1>Zaloguj się</h1>
            </div>
        </div>

        <form method="POST" action="{{ route('login.authenticate') }}">
            @csrf
            <!-- Email Address -->
            <div class="form-group mb-2">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}"
                class="@error('email') is-invalid @else is-valid @enderror">
                @error('email')
                <div class="invalid-feedback">Nieprawidłowy email</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="password">Hasło</label>
                <input id="password" name="password" type="password"
                    class="@error('password') is-invalid @else is-valid @enderror">
                    @error('password')
                    <div class="invalid-feedback">Nieprawidłowe hasło</div>
                    @enderror
            </div>
            <div class="form-group mt-4">
                <input type="submit" value="Wyślij">
            </div>
        </form>
    </div>

    @include('shared.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


</body>

</html>
