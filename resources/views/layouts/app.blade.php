<!DOCTYPE html>
<html lang="id" x-data="{ sidebarOpen: window.innerWidth > 768, overlayShow: false }"
    @resize.window="sidebarOpen = window.innerWidth > 768">

<head>
    @include('partials.meta')

    {{--
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/assets/img/favicon.png"> --}}
    <title>SPP | @yield('title')</title>
</head>

<body>

    <!-- Sidebar -->
    @include('partials.sidebar')

    <!-- Main Content -->
    <div class="main-content" :class="{ 'full': !sidebarOpen && window.innerWidth > 768 }">
        <!-- Navbar -->
        @include('partials.navbar')

        <!-- Content -->
        @yield('content')

        <!-- Footer -->
        @include('partials.footer')
</body>

</html>