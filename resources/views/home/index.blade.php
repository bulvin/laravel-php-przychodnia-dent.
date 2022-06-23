<!doctype html>
<html lang="pl">
@include('shared.header')

<body>

    @include('shared.nav')

    <div id="start" class="mb-5">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('storage/img/o2.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>ZAPRASZAMY DO WIZYTY!</h1>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/img/o1.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>ZAPRASZAMY DO WIZYTY!</h1>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/img/o4.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>ZAPRASZAMY DO WIZYTY!</h1>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div id="dentysci" class="container mb-3">
        <div class="row">
            <h1 id="dent">Dentyści</h1>
        </div>
        <div class="row justify-content-md-center">
            <div class="card-group">
            @forelse ($dentists as $d)
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card" style="width: 25rem">

                        <div class="card-body">
                            <h5 class="card-title">{{ $d->fullname }}</h5>
                            <p class="card-text">Specjalizuje się w:</p>
                            <p class="card-text"> {{ $d->specialization }}</p>
                            <p class="card-text">Kontakt: <small class="text-muted">{{$d->contact_number}}</small></p>
                        </div>
                    </div>
                </div>
            @empty
                <p>Brak wycieczek.</p>
            @endforelse
            </div>
        </div>
    </div>
    <div class="container lg-3">
        <div class="row">
            <h1 id="serv">Oferowane usługi</h1>
        </div>
    <table class="table table-striped table-responsive align middle">
        <thead>
            <tr>
                <th>Nazwa</th>
                <th>Opis</th>
                <th>Cena</th>
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
