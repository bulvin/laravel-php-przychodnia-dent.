<!doctype html>
<html lang="pl">
@include('shared.header')

<body>

    @include('shared.nav')

    <div id="..." class="container-lg mt-3 mb-5" style="text-align: center;">
        <div class="d-flex justify-content-center">
            <div class="card " style="width: 25rem; margin-top:4rem">
                <h5 class="card-header">Wizyta </h5>
                <div class="card-body">
                    <h5 class="card-text">{{ $appointment->patient->firstname }}
                        {{ $appointment->patient->secondname }}</h5>
                    <p class="card-text"">Data -
                        {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d.m.Y') }}
                        {{ \Carbon\Carbon::createFromFormat('H:i:s', $appointment->appointment_hour)->format('H:i') }}
                    </p>
                    <p class="card-text " style="text-align: ">Dentysta - {{ $appointment->dentist->fullname }}</p>
                    <div class="card-body">
                    <h5 class="card-text">Usługi</h5>
                    <ul class="list-group list-group-flush">
                        @foreach ($appointment->services as $a)
                            <li class="list-group-item">{{$a->name}}</li>
                        @endforeach


                    </ul>
                    </div>
                    <div class="card-body">
                        <a href="{{route('appointments.index')}}" class="card-link"><button type="button" class="btn btn-primary">Powrót</button></a>

                    </div>
                </div>
            </div>
        </div>
    </div>

@include('shared.footer')
</body>
</html>
