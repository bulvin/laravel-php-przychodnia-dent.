<!doctype html>
<html lang="pl">
@include('shared.header')

<body>
    @include('shared.nav')
    <div id="..." class="container mt-3 mb-5">
        <div class="mt-4 mb-4">
            <div class="row">
                <h1>Edycja wizyty</h1>
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
        <form method="POST" action="{{ route('appointments.update', $a->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group mb-2">
                <label for="exampleFormControlSelect1">Pacjent</label>
                <select class="form-select" id="exampleFormControlSelect1" name="patient"
                    placeholder="Wybierz pacjenta">
                    <option selected value="{{ $a->patient_id }}">{{ $a->patient->firstname }}
                        {{ $a->patient->secondname }}
                    </option>


                </select>
            </div>
            <div class="form-group mb-2">
                <label for="exampleFormControlSelect1">Dentysta</label>
                <select class="form-select" id="exampleFormControlSelect1" name="dentist"
                    placeholder="Wybierz dentystę">
                    @forelse ($dentists as $d)
                        <option @if ($d->id == $a->dentist_id) selected @endif value="{{ $d->id }}">
                            {{ $d->fullname }}</option>
                    @empty
                        <option placeholder="Brak dentystów" selected></option>
                    @endforelse

                </select>
            </div>
            <div class="form-group mb-2">
                <label for="appointment_date">Data wizyty</label>
                <input id="appointment_date" name="appointment_date" type="date" min="{{  $a->appointment_date}}" value="{{ $a->appointment_date }}"
                    class="@error('appointment_date') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Nieprawidłowa data wizyty</div>
            </div>

            <div class="form-group mb-2">

                <label for="appointment_hour">Wybierz godzine wizyty:</label>

                <input type="time" id="appointment_hour" name="appointment_hour" value="{{  \Carbon\Carbon::createFromFormat('H:i:s',$a->appointment_hour)->format('H:i')}}"
                    min="09:00" max="17:00">

            </div>

            <div class="form-group mb-2">
                <label for="service">Usługi</label>
                <select class="form-select" id="service" multiple="multiple" aria-label="multiple select example"
                    name="service[]" size="10">

                    @foreach ($services as $s)
                        <option @if ($a->services()->detach($s->id)) selected
                            @php
                                   $a->services()->attach($s->id)
                            @endphp
                          @endif value="{{ $s->id }}">
                        {{ $s->name }}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group mb-2">
                <label for="status">Status Wizyty</label>

            <select class="form-select form-select-lg sm-3" name="status" id="status" aria-label=".form-select-lg example">
                <option @if ($a->status == 'Oczekuje') selected @endif value="Oczekuje">Oczekuje</option>
                <option @if ($a->status == 'Ukończony') selected @endif value="Ukończony">Ukończony</option>
              </select>

            </div>

            <button type="submit" class="btn btn-primary mb-3">Wyślij</button>
        </form>
    </div>

    @include('shared.footer')





    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


</body>

</html>
