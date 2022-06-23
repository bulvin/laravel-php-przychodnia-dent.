<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top" style="border-bottom: 1px solid rgb(66, 66, 66);">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home.index') }}">Przychodnia dentystyczna</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link @if (str_contains(request()->path(), 'dentists')) active @endif" href="{{route('dentists.index')}}">Dentyści</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link @if (str_contains(request()->path(), 'dentists')) active @endif" href="#dent">Dentyści</a>
                </li>
                @endif

                @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link @if (str_contains(request()->path(), 'services')) active @endif" href="{{route('services.index')}}">Usługi</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link @if (str_contains(request()->path(), 'services')) active @endif" href="#serv">Usługi</a>
                </li>
                @endif

                @if (Auth::check())

                <li class="nav-item">
                    <a class="nav-link @if (str_contains(request()->path(), 'services')) active @endif"
                        href="{{ route('patients.index') }}">Pacjenci</a>
                </li>

                @endif

                @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link @if (str_contains(request()->path(), 'services')) active @endif"
                        href="{{ route('appointments.index') }}">Wizyty</a>
                </li>
                @endif
            </ul>
            <div class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"> {{ Auth::user()->name }},
                                Wyloguj się... </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Zaloguj się...</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
</nav>
