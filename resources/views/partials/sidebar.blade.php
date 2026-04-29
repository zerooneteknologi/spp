<nav class="sidebar"
    :class="{ 'hide': !sidebarOpen && window.innerWidth > 768, 'show': sidebarOpen && window.innerWidth <= 768 }">
    <ul class="nav flex-column px-2">
        <li class="nav-item">
            <a wire:navigate class="nav-link {{ request()->routeIs('dashboard') ? 'active': ''}}"
                href="{{ route('dashboard') }}"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
        </li>
    </ul>
</nav>

<!-- Overlay -->
<div class="overlay" :class="{ 'show': sidebarOpen && window.innerWidth <= 768 }" @click="sidebarOpen = false">
</div>