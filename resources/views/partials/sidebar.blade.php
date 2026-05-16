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
        <li class="nav-item">
            <a wire:navigate class="nav-link {{ request()->routeIs('schools.*') ? 'active': ''}}"
                href="{{ route('schools.index') }}"><i class="bi bi-building me-2"></i>Profil Sekolah</a>
        </li>
        <li class="nav-item">
            <a wire:navigate class="nav-link {{ request()->routeIs('academic-years.*') ? 'active': ''}}"
                href="{{ route('academic-years.index') }}"><i class="bi bi-calendar3 me-2"></i>Tahun Ajaran</a>
        </li>
        <li class="nav-item">
            <a wire:navigate class="nav-link {{ request()->routeIs('dsp-plans.*') ? 'active': ''}}"
                href="{{ route('dsp-plans.index') }}"><i class="bi bi-cash-stack me-2"></i>Rencana DSP</a>
        </li>
    </ul>
    <ul class="nav flex-column px-2">
        <li class="nav-item">
            <a wire:navigate class="nav-link {{ request()->routeIs('classroom.*') ? 'active': ''}}"
                href="{{ route('classroom.index') }}"><i class="bi bi-bank me-2"></i>Kelas</a>
        </li>
    </ul>
    <ul class="nav flex-column px-2">
        <li class="nav-item dropdown">
            <a class="nav-link d-flex align-items-center justify-content-between" href="#" data-bs-toggle="collapse"
                data-bs-target="#settingsMenu" aria-expanded="false" aria-controls="settingsMenu">
                <span><i class="bi bi-gear me-2"></i>Pengaturan</span>
                <i class="bi bi-caret-down-fill"></i>
            </a>
            <div class="collapse" id="settingsMenu">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item">
                        <a wire:navigate class="nav-link {{ request()->routeIs('schools.*') ? 'active': ''}}"
                            href="{{ route('schools.index') }}"><i class="bi bi-building me-2"></i>Profil Sekolah</a>
                    </li>
                    <li class="nav-item">
                        <a wire:navigate class="nav-link" href="#"><i class="bi bi-calendar me-2"></i>Tahun Ajaran</a>
                    </li>
                    <li class="nav-item">
                        <a wire:navigate class="nav-link" href="#"><i class="bi bi-wallet2 me-2"></i>Setup SPP</a>
                    </li>
                    <li class="nav-item">
                        <a wire:navigate class="nav-link " href="#"><i class="bi bi-bank2 me-2"></i>Setup DSP</a>
                    </li>
                    <li class="nav-item">
                        <a wire:navigate class="nav-link " href="#"><i class="bi bi-credit-card-2-front me-2"></i>Metode
                            Bayar</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>


</nav>

<!-- Overlay -->
<div class="overlay" :class="{ 'show': sidebarOpen && window.innerWidth <= 768 }" @click="sidebarOpen = false">
</div>