@extends('layouts.app')

@section('title', 'Sekolah')

@section('content')
    <div class="container-fluid mt-4">
        @include('partials.flash')

        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sekolah</li>
            </ol>
        </nav>

        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
            <h1 class="h4 mb-0 fw-bold">Data sekolah</h1>
            <a href="{{ route('schools.create') }}" class="btn btn-primary" wire:navigate>
                <i class="bi bi-plus-lg me-1"></i> Tambah sekolah
            </a>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Status</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($schools as $school)
                                <tr>
                                    <td class="fw-medium">{{ $school->name }}</td>
                                    <td>{{ $school->email }}</td>
                                    <td>{{ $school->phone ?? '—' }}</td>
                                    <td>
                                        @if ($school->status === 'active')
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-secondary">Tidak aktif</span>
                                        @endif
                                    </td>
                                    <td class="text-end text-nowrap">
                                        <a href="{{ route('schools.show', $school) }}" class="btn btn-sm btn-outline-secondary"
                                            wire:navigate title="Detail">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('schools.edit', $school) }}" class="btn btn-sm btn-outline-primary"
                                            wire:navigate title="Ubah">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('schools.destroy', $school) }}" method="post" class="d-inline"
                                            onsubmit="return confirm('Hapus sekolah ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-5">
                                        Belum ada data sekolah. <a href="{{ route('schools.create') }}" wire:navigate>Tambah
                                            pertama</a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if ($schools->hasPages())
                <div class="card-footer bg-white border-top-0 pt-0">
                    {{ $schools->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
