<!doctype html>
<html lang="pl">
@include('shared.header')

<body>

    @include('shared.nav')
    <div id="..." class="container mt-3 mb-5" >
        <div class="mt-4 mb-4" >
            <div class="row">
                <h1>Dodaj nowego dentyste</h1>
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
        <form method="POST" action="{{ route('dentists.store') }}">
            @csrf
            <div class="form-group mb-2">
                <label for="fullname">Nazwa</label>
                <input id="fullname" name="fullname" type="text"
                    class="@error('fullname') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Nieprawidłowa nazwa</div>
            </div>
            <div class="form-group mb-2">
                <label for="birthday_date">Data urodzenia</label>
                <input id="birthday_date" name="birthday_date" type="date"
                    class="@error('birthday_date') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Nieprawidłowa data urodzenia</div>
            </div>
            <div class="form-group mb-2">
                <label for="contact_number">Telefon kontaktowy</label>
                <input id="contact_number" name="contact_number" type="text" minlength="9" maxlength="9"
                    class="@error('contact_number') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Nieprawidłowy telefon kontaktowy</div>
            </div>
            <div class="form-group mb-2">
                <label for="exampleFormControlSelect1">Specjalizacja</label>
                <select class="custom-select custom-select-sm-10 @error('specialization') is-invalid @else is-valid @enderror" id="exampleFormControlSelect1" name="specialization">
                    <option value="Stomatologia zachowawcza z endodoncją">Stomatologia zachowawcza z endodoncją</option>
                    <option value="Periodontologia">Periodontologia</option>
                    <option value="Stomatologia dziecięca" selected>Stomatologia dziecięca</option>
                    <option value="Ortodoncja">Ortodoncja</option>
                </select>
                <div class="invalid-feedback">Nieprawidłowa specjalizacja</div>
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
                    <input class="form-check-input"  type="radio" name="gender" id="female" value="Kobieta">
                    <label class="form-check-label" for="female">
                        Kobieta
                    </label>
                    @if ($errors->has("gender"))
                    @foreach ($errors->get("gender") as $msg)
                      <div style='display:block' class='invalid-feedback'>Nie wybrano płci</div>
                    @endforeach
                  @endif
                </div>
                <div class="invalid-feedback">Nie wybrano płci</div>
            </div>
            <input type="submit" value="Wyślij">
        </form>
    </div>

    @include('shared.footer')





    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


</body>

</html>
