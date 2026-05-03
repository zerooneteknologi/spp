<nav class="sidebar"
    :class="{ 'hide': !sidebarOpen && window.innerWidth > 768, 'show': sidebarOpen && window.innerWidth <= 768 }">
    <div class="logo d-flex align-items-center justify-content-center gap-2">
        <img src="{{ asset('assets/img/logo/ZeroOne.ico')}}" alt="Logo" width="35">
        <!-- Span ini yang akan menerima efek gradasi identitas di CSS -->
        <span>Zero One</span>
    </div>

    <ul class="nav flex-column px-2">
        <li class="nav-item">
            <a wire:navigate class="nav-link {{ request()->routeIs('dashboard') ? 'active': ''}}"
                href="{{ route('dashboard') }}"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
        </li>
    </ul>
    <ul class="nav flex-column px-2">
        <li class="nav-item">
            <a wire:navigate class="nav-link" href="#"><i class="bi bi-gear me-2"></i>Setting</a>
        </li>
    </ul>
</nav>

<!-- Overlay -->
<div class="overlay" :class="{ 'show': sidebarOpen && window.innerWidth <= 768 }" @click="sidebarOpen = false">
</div>