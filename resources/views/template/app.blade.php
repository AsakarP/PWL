<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @yield('vendor-css')
    @yield('custom-css')
</head>

<body>

    <!-- Konten sidebar -->
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark sidebar">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/"
                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link align-middle px-0">
                                <i class="fas fa-home"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profile') }}" class="nav-link px-0 align-middle">
                                <i class="fas fa-clipboard-list"></i> <span
                                    class="ms-1 d-none d-sm-inline">Profile</span></a>
                        </li>
                        @if (Auth::user()->role->nama === 'program studi')
                            <li>
                                <a href="{{ route('kurikulum') }}" class="nav-link px-0 align-middle">
                                    <i class="fas fa-clipboard-list"></i> <span
                                        class="ms-1 d-none d-sm-inline">Kurikulum</span></a>
                            </li>
                            <li>
                                <a href="{{ route('user') }}" class="nav-link px-0 align-middle">
                                    <i class="fas fa-users"></i> <span class="ms-1 d-none d-sm-inline">Users</span>
                                </a>
                            </li>
                        @endif
                        <li>
                            <a href="{{ route('polling') }}" class="nav-link px-0 align-middle">
                                <i class="fas fa-chart-line"></i> <span class="ms-1 d-none d-sm-inline">Polling</span>
                            </a>
                        </li>
                        {{-- <li>
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fas fa-chart-line"></i> <span class="ms-1 d-none d-sm-inline">Polling</span>
                            </a>
                            <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="{{ route('polling') }}" class="nav-link px-0"> <span
                                            class="d-none d-sm-inline">Index</span></a>
                                </li>
                                <li class="w-100">
                                    <a href="{{ route('mata-kuliah-polling') }}" class="nav-link px-0"> <span
                                            class="d-none d-sm-inline">Index</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0"> <span
                                            class="d-none d-sm-inline">Result</span></a>
                                </li>
                            </ul>
                        </li> --}}

                    </ul>
                    <hr>
                    <div class="dropdown pb-4">
                        <a href="#"
                            class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            @if (Auth::user()->profile_img)
                                <img src="{{ asset('storage/' . Auth::user()->profile_img) }}" alt="hugenerd"
                                    width="30" height="30" class="rounded-circle img-fluid">
                            @else
                                <i class="fa fa-user-circle" style="font-size: 30px;"></i>
                            @endif
                            <div class="d-flex flex-column ms-2">
                                <span class="d-inline-block">{{ Auth::user()->name }}</span>
                                <span class="badge bg-primary">{{ Auth::user()->role->nama }}</span>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col py-3">
                <div class="container-fluid mt-3">
                    <div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    Pages
                                </li>
                                @if (View::hasSection('breadcrumb'))
                                    <li class="breadcrumb-item">
                                        @yield('breadcrumb')
                                    </li>
                                @else
                                    <li class="breadcrumb-item">
                                        {{ str_replace('-', ' ', Request::path()) }}
                                    </li>
                                @endif
                            </ol>
                        </nav>
                    </div>
                    <!-- Content -->
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @yield('footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    @yield('vendor-javascript')
    @yield('custom-javascript')

</body>

</html>
