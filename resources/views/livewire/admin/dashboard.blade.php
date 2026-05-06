<div>
    <div class="container-fluid mt-4">

        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>

        {{-- Alert profil belum lengkap --}}
        @if ($profileIncomplete)
            <div class="alert alert-warning d-flex align-items-center gap-3 mb-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill fs-5"></i>
                <div class="flex-grow-1">
                    <strong>Profil sekolah belum lengkap.</strong>
                    Lengkapi nomor telepon dan alamat agar sistem berjalan optimal.
                </div>
                <a href="{{ route('schools.edit', $school) }}" class="btn btn-sm btn-warning fw-semibold text-nowrap">
                    Lengkapi Sekarang
                </a>
            </div>
        @endif

        {{-- Welcome Card --}}
        <div class="row mb-4">
            <div class="col-12">
                <div class="card card-welcome p-4 shadow-sm">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h2 class="fw-bold mb-1">Selamat Datang, {{ auth()->user()->name }}!</h2>
                            @if ($school)
                                <p class="mb-0 opacity-75">
                                    <i class="bi bi-building me-1"></i>{{ $school->name }}
                                    @if ($school->status === 'active')
                                        <span class="badge bg-success ms-1">Aktif</span>
                                    @else
                                        <span class="badge bg-secondary ms-1">Tidak aktif</span>
                                    @endif
                                </p>
                            @endif
                        </div>
                        <i class="bi bi-speedometer2 welcome-icon"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Info Sekolah --}}
        @if ($school)
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <div class="card p-3 border-0 shadow-sm h-100">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <div class="icon-box bg-soft-purple">
                                <i class="bi bi-building"></i>
                            </div>
                            <span class="text-muted fw-bold small">Profil Sekolah</span>
                        </div>
                        <p class="fw-semibold mb-1">{{ $school->name }}</p>
                        <p class="small text-muted mb-1">
                            <i class="bi bi-envelope me-1"></i>{{ $school->email }}
                        </p>
                        @if ($school->phone)
                            <p class="small text-muted mb-1">
                                <i class="bi bi-telephone me-1"></i>{{ $school->phone }}
                            </p>
                        @endif
                        @if ($school->address)
                            <p class="small text-muted mb-0">
                                <i class="bi bi-geo-alt me-1"></i>{{ $school->address }}
                            </p>
                        @endif
                        <div class="mt-3">
                            <a href="{{ route('schools.edit', $school) }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-pencil me-1"></i>Ubah Profil
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card p-3 border-0 shadow-sm h-100">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <div class="icon-box bg-soft-blue">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <span class="text-muted fw-bold small">Siswa</span>
                        </div>
                        <h3 class="fw-bold mb-0 text-dark">—</h3>
                        <p class="small text-muted mt-1 mb-0">Belum ada data</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card p-3 border-0 shadow-sm h-100">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <div class="icon-box bg-soft-purple">
                                <i class="bi bi-cash-stack"></i>
                            </div>
                            <span class="text-muted fw-bold small">Tagihan Bulan Ini</span>
                        </div>
                        <h3 class="fw-bold mb-0 text-dark">—</h3>
                        <p class="small text-muted mt-1 mb-0">Belum ada data</p>
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>