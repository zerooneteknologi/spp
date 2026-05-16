<div class="container-fluid mt-4">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active" aria-current="page"><a wire:navigate
                    href="{{ route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kelas</li>
        </ol>
    </nav>

    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-3 h-100 rounded-4">
                <div class="d-flex align-items-center">
                    <div class="icon-box bg-soft-blue">
                        <i class="bi bi-door-open"></i>
                    </div>
                    <div>
                        <span class="text-muted small fw-bold">Total Kelas</span>
                        <h3 class="fw-bold mb-0">12</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-3 h-100 rounded-4">
                <div class="d-flex align-items-center">
                    <div class="icon-box bg-soft-purple">
                        <i class="bi bi-people"></i>
                    </div>
                    <div>
                        <span class="text-muted small fw-bold">Total Siswa</span>
                        <h3 class="fw-bold mb-0">356</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-3 h-100 rounded-4 border-start border-4 border-success">
                <div class="d-flex align-items-center">
                    <div class="icon-box bg-light text-success">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <div>
                        <span class="text-muted small fw-bold">Kelas Aktif</span>
                        <h3 class="fw-bold mb-0 text-success">10</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm zo-table-container">
        <div class="row g-3 align-items-center m-3">
            <div class="col-md-4">
                <div class="input-group bg-light rounded-5 px-2">
                    <input type="text" class="form-control bg-transparent border-0 py-2"
                        placeholder="Cari nama kelas..." wire:model.live="search">
                </div>
            </div>
            <div class="col-md-2">
                <select class="form-select border-0 bg-light rounded-5 py-2" wire:model.live="filterTahun">
                    <option value="">Tahun Ajaran</option>
                    <option value="2024/2025">2024/2025</option>
                    <option value="2023/2024">2023/2024</option>
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select border-0 bg-light rounded-5 py-2" wire:model.live="filterTingkat">
                    <option value="">Semua Tingkat</option>
                    <option value="10">Tingkat 10</option>
                    <option value="11">Tingkat 11</option>
                    <option value="12">Tingkat 12</option>
                </select>
            </div>
            <div class="col-md-4 text-md-end">
                <button class="btn btn-light rounded-5 px-4 py-2 w-100 w-md-auto">
                    <i class="bi bi-plus-lg me-2"></i>Tambah Kelas
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 80px;">No</th>
                        <th>Nama Kelas</th>
                        <th>Kompetensi Keahlian</th>
                        <th class="text-center">Total Siswa</th>
                        <th class="text-center" style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center fw-bold text-muted">1</td>
                        <td>
                            <div class="fw-bold">XII RPL 1</div>
                            <span class="text-muted small">Tingkat 12</span>
                        </td>
                        <td>
                            <span class="badge badge-prodi rounded-pill px-3 py-2">
                                Rekayasa Perangkat Lunak
                            </span>
                        </td>
                        <td class="text-center">
                            <span class="fw-semibold">36 Siswa</span>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn-action btn-edit" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <button class="btn-action btn-delete" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center fw-bold text-muted">2</td>
                        <td>
                            <div class="fw-bold">XI TKJ 2</div>
                            <span class="text-muted small">Tingkat 11</span>
                        </td>
                        <td>
                            <span class="badge badge-prodi rounded-pill px-3 py-2"
                                style="background: rgba(142, 84, 162, 0.1); color: #8E54A2; border-color: rgba(142, 84, 162, 0.2);">
                                Teknik Komputer Jaringan
                            </span>
                        </td>
                        <td class="text-center">
                            <span class="fw-semibold">32 Siswa</span>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn-action btn-edit" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <button class="btn-action btn-delete" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card-footer bg-white border-0 py-3 px-4">
            <div class="d-flex justify-content-between align-items-center">
                <span class="small text-muted">Menampilkan 1 sampai 2 dari 12 data</span>
                <nav>
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item disabled"><a class="page-link border-0" href="#">Prev</a></li>
                        <li class="page-item active"><a class="page-link border-0"
                                style="background: var(--primary-blue)" href="#">1</a></li>
                        <li class="page-item"><a class="page-link border-0" href="#">2</a></li>
                        <li class="page-item"><a class="page-link border-0" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>