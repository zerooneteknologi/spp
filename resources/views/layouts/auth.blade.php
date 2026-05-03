<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>SPP | @yield('title')</title>

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/logo/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo/favicon.png')}}">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!--Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    @livewireStyles

</head>

<body style="background-color:#0f172a">

    <div class="container-fluid">
        <div class="row min-vh-100">
            {{-- LEFT SIDE --}}
            <div class="col-md-6 d-none d-md-flex flex-column justify-content-center align-items-center text-white">

                <div class="text-center px-5">
                    <img src="{{ asset('assets/img/logo/ZeroOne.ico') }}" class="img-fluid mb-4"
                        style="max-height:120px; filter: drop-shadow(0px 4px 15px rgba(0,0,0,0.2));">

                    <h2 class="fw-bold">Zero One</h2>
                    <p class="opacity-75">
                        jasa pembuatan website dan aplikasi & Penyedia layanan berbagai aplikasi digital.
                    </p>
                </div>

            </div>

            {{-- RIGHT SIDE --}}
            <div class="col-md-6 d-flex align-items-center justify-content-center bg-light">

                @yield('content')

            </div>
        </div>

    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>

    @livewireScripts
</body>

</html>