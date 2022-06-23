<!doctype html>
<html lang="pl">

    @include('shared.header')


<div id="..." class="container mt-3 mb-5">
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="mt-4 mb-4">
        <div class="row">
            <h1>Edytuj dane osobowe pacjenta</h1>
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

    <form method="POST" action="{{ route('patients.update', $p->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group mb-2">
            <label for="firstname">Imię</label>
            <input id="firstname" name="firstname" type="text" class="@error('firstname') is-invalid @else is-valid @enderror" value="{{$p->firstname}}">
            <div class="invalid-feedback">Nieprawidłowe  imię</div>
        </div>
        <div class="form-group mb-2">
            <label for="secondname">Nazwisko</label>
            <input id="secondname" name="secondname" type="text" class="@error('secondname') is-invalid @else is-valid @enderror" value="{{$p->secondname}}">
            <div class="invalid-feedback">Nieprawidłowe nazwisko</div>
        </div>
        <div class="form-group mb-2">
            <label for="contact_number">Telefon kontaktowy</label>
            <input id="contact_number" name="contact_number" type="text" minlength="9" maxlength="9" value="{{$p->contact_number}}" class="@error('contact_number') is-invalid @else is-valid @enderror">
            <div class="invalid-feedback">Nieprawidłowy telefon kontaktowy</div>
        </div>

          <div class="form-group mb-2">
            <label>Płeć</label>
            <div class="form-check">
                <input @if($p->gender == "Mężczyzna")  checked   @endif class="form-check-input" type="radio" name="gender" id="male" value="Mężczyzna">
                <label class="form-check-label" for="male">
                  Mężczyzna
                </label>
              </div>
              <div class="form-check">
                <input @if($p->gender == "Kobieta")  checked   @endif class="form-check-input" type="radio" name="gender" id="female" value="Kobieta">
                <label class="form-check-label" for="female">
                  Kobieta
                </label>
              </div>
            </div>
        <input type="submit" value="Wyślij">
    </form>
</div>
