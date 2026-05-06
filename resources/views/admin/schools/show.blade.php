@extends('layouts.app')

@section('title', 'Detail sekolah')

@section('content')
    <div class="container-fluid mt-4">
        @include('partials.flash')

        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('schools.index') }}" wire:navigate>Sekolah</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail</li>
            </ol>
        </nav>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3 d-flex flex-wrap justify-content-between align-items-center gap-2">
                        <h1 class="h5 mb-0 fw-bold">{{ $school->name }}</h1>
                        <div class="d-flex gap-2">
                            <a href="{{ route('schools.edit', $school) }}" class="btn btn-sm btn-primary" wire:navigate>
                                <i class="bi bi-pencil me-1"></i> Ubah
                            </a>
                            <a href="{{ route('schools.index') }}" class="btn btn-sm btn-outline-secondary" wire:navigate>Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <dl class="row mb-0">
                            <dt class="col-sm-3 text-muted">Email</dt>
                            <dd class="col-sm-9"><a href="mailto:{{ $school->email }}">{{ $school->email }}</a></dd>

                            <dt class="col-sm-3 text-muted">Telepon</dt>
                            <dd class="col-sm-9">{{ $school->phone ?? '—' }}</dd>

                            <dt class="col-sm-3 text-muted">Status</dt>
                            <dd class="col-sm-9">
                                @if ($school->status === 'active')
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-secondary">Tidak aktif</span>
                                @endif
                            </dd>

                            <dt class="col-sm-3 text-muted">Alamat</dt>
                            <dd class="col-sm-9">{{ $school->address ?? '—' }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
