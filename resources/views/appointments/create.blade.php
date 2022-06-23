<!doctype html>
<html lang="pl">
@include('shared.header')

<body>

    @include('shared.nav')
    <div id="..." class="container mt-3 mb-5">
        <div class="mt-4 mb-4">
            <div class="row">
                <h1>Dodaj nową wizytę</h1>
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
        <form method="POST" action="{{route('appointments.store')}}">
            @csrf
            <div class="form-group mb-2">
                <label for="exampleFormControlSelect1">Pacjent</label>
                <select class="form-select" id="exampleFormControlSelect1" name="patient"
                    placeholder="Wybierz pacjenta">
                    <option aria-label="Brak pacjentów"></option>
                    @forelse ($patients as $p)
                        <option value="{{ $p->id }}">{{ $p->firstname }} {{ $p->secondname }}
                            {{ $p->contact_number }}</option>
                    @empty
                        <option selected>Brak pacjentów</option>
                    @endforelse

                </select>
            </div>
            <div class="form-group mb-2">
                <label for="exampleFormControlSelect1">Dentysta</label>
                <select class="form-select" id="exampleFormControlSelect1" name="dentist"
                    placeholder="Wybierz dentystę">
                    <option placeholder="Wybierz dentystę"></option>
                    @forelse ($dentists as $d)
                        <option value="{{ $d->id }}">{{ $d->fullname }}</option>
                    @empty
                        <option placeholder="Brak dentystów" selected></option>
                    @endforelse

                </select>
            </div>
            <div class="form-group mb-2">
                <label for="appointment_date">Data wizyty</label>
                <input id="appointment_date" name="appointment_date" type="date" min="{{ now()->toDateString('d-m-Y')}}"
                    class="@error('appointment_date') is-invalid @else is-valid @enderror">
            </div>

            <div class="form-group mb-2">

                <label for="appointment_hour">Wybierz godzine wizyty:</label>

                <input type="time" id="appointment_hour" name="appointment_hour" min="09:00" max="17:00">

            </div>
            <div class="form-group mb-2">
            <label for="service">Usługi:</label>
            <select class="form-select" multiple="multiple" aria-label="multiple select example" name="service[]" size="10">


                @forelse ($services as $s)
                    <option value="{{ $s->id }}">{{ $s->name }}</option>
                @empty
                    <option placeholder="Brak usług" selected>Brak usług</option>
                @endforelse

            </select>
        </div>

        @include('shared.footer')




            <input type="submit" value="Wyślij">
        </form>
    </div>





    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


</body>

</html>
