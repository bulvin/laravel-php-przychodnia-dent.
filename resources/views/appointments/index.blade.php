<!doctype html>
<html lang="pl">
@include('shared.header')

<body>
    @include('shared.nav')

    <div class="container-fluid" style="margin-top:2rem;">
    <h1>Wizyty</h1>
    <div class="row">
        <a href="{{ route('appointments.create') }}">Dodaj wizytę</a>
    </div>
    @if ($appointments->count()>0)
    @php
        $count=1;
    @endphp
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Pacjent</th>
                <th scope="col">Stomatolog</th>
                <th scope="col">Data wizyty</th>
                <th scope="col">Godzina</th>
                <th scope="col">Status</th>
                <th scope="col">Edycja</th>
                <th scope="col">Usuń</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($appointments as $a)
                <tr>
                    <td>
                        <a href="{{ route('appointments.show', $a->id) }}">{{ $count++ }}</a>
                    </td>
                    <td>

                        {{ $a->patient->firstname }}
                        {{$a->patient->secondname}}
                    </td>
                    <td>
                        {{ $a->dentist->fullname }}
                    </td>
                    <td>
                        {{ Carbon\Carbon::parse($a->appointment_date)->format('d.m.Y') }}
                    </td>
                    <td>
                        {{\Carbon\Carbon::createFromFormat('H:i:s',$a->appointment_hour)->format('H:i')}}
                    </td>
                    <td>
                        {{ $a->status }}
                    </td>
                    <td>
                        <button type="button" class="btn btn-link" @if ($a->status == 'Ukończony') disabled @endif><a href="{{ route('appointments.edit', $a->id) }}"
                                    >Edycja</a></button>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('appointments.destroy', $a->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Usuń</button>
                        </form>
                    </td>

                </tr>
            @empty
                <tr>
                    <th scope="row" colspan="8">Brak wizyt.</th>
                </tr>
            @endforelse
        </tbody>

    </table>
    </div>

        @include('shared.footer')

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>


</body>

</html>
