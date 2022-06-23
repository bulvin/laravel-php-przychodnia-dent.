<!doctype html>
<html lang="pl">
@include('shared.header')

<body>

    @include('shared.nav')

    <div class="container-fluid" style="margin-top:2rem;">
        <div class="row justify-content-md-center">
    <h1>Dentyśći</h1>
    <div class="row">
        <a href="{{ route('dentists.create') }}">Dodaj dentystę</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Stomatolog</th>
                <th>Specjalizacja</th>
                <th>Płeć</th>
                <th>Data urodzenia</th>
                <th>Telefon kontaktowy</th>
                <th>Edycja</th>
                <th>Usuń</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dentists as $d)
                <tr>
                    <td>
                        {{ $d->fullname }}
                    </td>
                    <td>
                        {{ $d->specialization }}
                    </td>
                    <td>
                        {{ $d->gender }}
                    </td>
                    <td>
                        {{ Carbon\Carbon::parse($d->birthday_date)->format('d.m.Y') }}
                    </td>
                    <td>
                        +48{{ $d->contact_number }}
                    </td>
                    <td>
                        <a href="{{ route('dentists.edit', $d->id) }}">Edycja</a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('dentists.destroy', $d->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Usuń</button>
                        </form>
                    </td>

                </tr>
            @empty
                <tr>
                    <th scope="row" colspan="6">Brak dentystów.</th>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
    </div>


        @include('shared.footer')


        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>


</body>

</html>
