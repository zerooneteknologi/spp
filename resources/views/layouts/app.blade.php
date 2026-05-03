<!DOCTYPE html>
<html lang="id" x-data="{ sidebarOpen: window.innerWidth > 768, overlayShow: false }"
    @resize.window="sidebarOpen = window.innerWidth > 768">

<head>
    @include('partials.meta')

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