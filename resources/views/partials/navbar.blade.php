<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <button class="btn btn-outline-primary" @click="sidebarOpen = !sidebarOpen">
            <i class="bi bi-list"></i>
        </button>
        <h4 class="mb-0 ms-2 text-capitalize">@yield('title', 'Dashboard')</h4>

        <div x-data="{ open: false }" class="position-relative ms-auto">

            <!-- Trigger -->
            <a href="#" @click.prevent="open = !open" class="d-flex align-items-center text-decoration-none">
                <img src="https://ui-avatars.com/api/?name=Admin" class="rounded-circle me-2" width="35" height="35">
                <span>Admin</span>
            </a>

            <!-- Dropdown -->
            <ul x-show="open" @click.away="open = false" x-transition class="dropdown-menu nav-menu show">
                <li><a class="dropdown-item" href="#">Profil</a></li>
                <li><a class="dropdown-item" href="#">Pengaturan</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Keluar
                    </a>
                </li>
            </ul>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>

        </div>

    </div>
</nav>