<!doctype html>
<html lang="pl">
    @include('shared.header')

    @include('shared.nav')
  <body>
    <div id="..." class="container mt-3 mb-5">
        <div class="mt-4 mb-4">
            <div class="row">
                <h1>Dodaj nowego pacjenta</h1>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{route('patients.store')}}">
            @csrf
            <div class="form-group mb-2">
                <label for="firstname">Imię</label>
                <input id="firstname" name="firstname" type="text" class="@error('name') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Nieprawidłowe  imie!</div>
            </div>
            <div class="form-group mb-2">
                <label for="secondname">Nazwisko</label>
                <input id="secondname" name="secondname" type="text" class="@error('name') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Nieprawidłowe  nazwisko</div>
            </div>
            <div class="form-group mb-2">
                <label for="contact_number">Telefon kontaktowy</label>
                <input id="contact_number" name="contact_number" type="text" minlength="9" maxlength="9" class="@error('contact_number') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Nieprawidłowy telefon kontaktowy</div>
            </div>
              <div class="form-group mb-2">
                <label>Płeć</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="Mężczyzna">
                    <label class="form-check-label" for="male">
                      Mężczyzna
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="Kobieta">
                    <label class="form-check-label" for="female">
                      Kobieta
                    </label>
                  </div>
                </div>
            <input type="submit" value="Wyślij">
        </form>
    </div>

    @include('shared.footer')





    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>
