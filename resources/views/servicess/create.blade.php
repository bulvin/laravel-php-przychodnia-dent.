<!doctype html>
<html lang="pl">
    @include('shared.header')
  <body>

    @include('shared.nav')
    <div id="..." class="container mt-3 mb-5">
        <div class="mt-4 mb-4">
            <div class="row">
                <h1>Dodaj nową usługę</h1>
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
        <form method="POST" action="{{route('services.store')}}">
            @csrf
            <div class="form-group mb-2">
                <label for="service-name">Nazwa</label>
                <input id="service-name" name="name" type="text" class="@error('name') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Nieprawidłowa  nazwa!</div>
            </div>
            <div class="form-group mb-2">
                <label for="price">Cena</label>
                <input id="price" name="price" type="number" min="1" step="any" class="@error('price') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Nieprawidłowa  cena!</div>
            </div>
            <div class="form-group blue-border-focus">
                <label for="description">Opis usługi</label>
                <textarea class="form-control" id="description" name="description" rows="5"></textarea>
              </div>


            <input type="submit" value="Wyślij">
        </form>
    </div>

    @include('shared.footer')





    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>
