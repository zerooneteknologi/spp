<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <button class="btn btn-outline-primary" @click="sidebarOpen = !sidebarOpen">
            <i class="bi bi-list"></i>
        </button>
        <h4 class="mb-0 ms-2 text-capitalize">@yield('title', 'Dashboard')</h4>

        <div x-data="{ open: false }" class="position-relative ms-auto">

            <!-- Trigger -->
            <a href="#" @click.prevent="open = !open"
                class="d-flex align-items-center text-decoration-none user-profile-link">
                <img src="{{ asset('assets/img/avatar/avatar.png')}}" class="rounded-circle me-2 border" width="35"
                    height="35" style="border-color: rgba(59, 169, 214, 0.3) !important;">
                <span class="fw-bold text-dark d-none d-sm-inline text-capitalize">{{ auth()->user()->name }}</span>
                <i class="bi bi-chevron-down ms-2 small text-muted"></i>
            </a>

            <!-- Dropdown: Gunakan 'right: 0' agar menempel ke kanan dan melebar ke kiri -->
            <ul x-show="open" x-cloak @click.away="open = false" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                class="dropdown-menu nav-menu shadow-lg border-0"
                style="display: block; position: absolute; right: 0; left: auto; min-width: 200px; margin-top: 10px;">

                <li class="dropdown-header small text-uppercase text-muted fw-bold">Manajemen Akun</li>
                <li><a class="dropdown-item py-2" href="#"><i class="bi bi-person me-2"></i> Profil</a></li>
                <li><a class="dropdown-item py-2" href="#"><i class="bi bi-gear me-2"></i> Pengaturan</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a class="dropdown-item text-danger py-2 fw-bold" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right me-2"></i> Keluar
                    </a>
                </li>
            </ul>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
        </div>

    </div>
</nav>