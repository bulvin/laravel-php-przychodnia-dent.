<!doctype html>
<html lang="pl">
@include('shared.header')

<body>
    @include('shared.nav')
    <div class="container-fluid" style="margin-top:2rem;">
    <h1>Wykonywane usługi</h1>
    <div class="row">
        <a href="{{ route('services.create') }}">Dodaj usługę</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nazwa</th>
                <th>Opis</th>
                <th>Cena</th>
                <th>Edytuj</th>
                <th>Usuń</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($services as $s)
                <tr>
                    <td>

                        {{ $s->name }}
                    </td>
                    <td>
                        {{ $s->description }}
                    </td>
                    <td>
                        {{ $s->price }}zł
                    </td>
                    <td>
                        <a href="{{ route('services.edit', $s->id) }}">Edycja</a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('services.destroy', $s->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Usuń</button>
                        </form>
                    </td>

                </tr>
            @empty
                <tr>
                    <th scope="row" colspan="3">Brak usług.</th>
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
