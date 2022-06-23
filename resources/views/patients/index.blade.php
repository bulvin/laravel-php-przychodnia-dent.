<!doctype html>
<html lang="pl">
    @include('shared.header')
  <body>
    @include('shared.nav')

    <div class="container-fluid" style="margin-top:2rem">
        <h1>Pacjenci</h1>
        <div class="row">
            <a href="{{route('patients.create')}}">Dodaj pacjenta</a>
        </div>

    <table class="table-responsive table align-middle">
        <thead>
        <tr>
          <th>Imie</th>
          <th>Naziwsko</th>
          <th>Płeć</th>
          <th>Telefon kontaktowy</th>
          <th>Edycja</th>
          <th>Usuń</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($patients as $p)
            <tr>
                <td>
                    {{$p->firstname}}
                </td>
                <td>
                    {{$p->secondname}}
                </td>
                <td>
                    {{$p->gender}}
                </td>
                <td>
                   +48{{$p->contact_number}}
                </td>
                    <td>
                        <a href="{{ route('patients.edit', $p->id) }}">Edycja</a>
                    </td>
                <td>
                    <form method="POST" action="{{route('patients.destroy', $p->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Usuń</button>
                    </form>
                </td>

            </tr>
            @empty
               <tr>
                    <th scope="row" colspan="7">Brak dentystów.</th>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>


        @include('shared.footer')


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>
