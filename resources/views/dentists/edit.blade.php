<!doctype html>
<html lang="pl">

    @include('shared.header')


<div id="..." class="container mt-3 mb-5">
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="mt-4 mb-4">
        <div class="row">
            <h1>Edytuj dane dentysty</h1>
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

    <form method="POST" action="{{ route('dentists.update', $d->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group mb-2">
            <label for="fullname">Nazwa</label>
            <input id="fullname" name="fullname" type="text" class="@error('name') is-invalid @else is-valid @enderror" value="{{$d->fullname}}">
            <div class="invalid-feedback">Nieprawidłowa  nazwa</div>
        </div>
        <div class="form-group mb-2">
            <label for="birthday_date">Data urodzenia</label>
            <input id="birthday_date" name="birthday_date" type="date" value="{{$d->birthday_date}}" class="@error('birthday_date') is-invalid @else is-valid @enderror">
            <div class="invalid-feedback">Nieprawidłowa data urodzenia</div>
        </div>
        <div class="form-group mb-2">
            <label for="contact_number">Telefon kontaktowy</label>
            <input id="contact_number" name="contact_number" type="text" minlength="9" maxlength="9" value="{{$d->contact_number}}" class="@error('contact_number') is-invalid @else is-valid @enderror">
            <div class="invalid-feedback">Nieprawidłowy telefon kontaktowy</div>
        </div>
        <div class="form-group mb-2">
            <label for="exampleFormControlSelect1">Specjalizacja</label>
            <select class="custom-select custom-select-sm-10" id="exampleFormControlSelect1" name="specialization">
              <option @if($d->specialization == 'Stomatologia zachowawcza z endodoncją')  selected  @endif value="Stomatologia zachowawcza z endodoncją" >Stomatologia zachowawcza z endodoncją</option>
              <option  @if($d->specialization == 'Periodontologia' )  selected  @endif value="Periodontologia">Periodontologia</option>
              <option @if($d->specialization == 'Stomatologia dziecięca' )  selected  @endif value="Stomatologia dziecięca">Stomatologia dziecięca</option>
              <option @if($d->specialization == 'Ortodoncja')  selected  @endif value="Ortodoncja">Ortodoncja</option>
            </select>
          </div>
          <div class="form-group mb-2">
            <label>Płeć</label>
            <div class="form-check">
                <input @if($d->gender == "Mężczyzna")  checked   @endif class="form-check-input" type="radio" name="gender" id="male" value="Mężczyzna">
                <label class="form-check-label" for="male">
                  Mężczyzna
                </label>
              </div>
              <div class="form-check">
                <input @if($d->gender == "Kobieta")  checked   @endif class="form-check-input" type="radio" name="gender" id="female" value="Kobieta">
                <label class="form-check-label" for="female">
                  Kobieta
                </label>
              </div>
            </div>
        <input type="submit" value="Wyślij">
    </form>
</div>
@include('shared.footer')
