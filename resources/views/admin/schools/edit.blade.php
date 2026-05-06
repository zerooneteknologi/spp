@extends('layouts.app')

@section('title', 'Profil Sekolah')

@section('content')
    @php $isNew = empty($school->phone) && empty($school->address); @endphp

    <div class="container-fluid mt-4">
        @include('partials.flash')

        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" wire:navigate>Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profil Sekolah</li>
            </ol>
        </nav>

        <div class="row justify-content-center">
            <div class="col-lg-8">

                @if ($isNew)
                    <div class="alert alert-info d-flex align-items-center gap-2 mb-4">
                        <i class="bi bi-info-circle-fill fs-5"></i>
                        <div>Selamat datang! Lengkapi profil sekolah Anda untuk mulai menggunakan sistem.</div>
                    </div>
                @endif

                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h1 class="h5 mb-0 fw-bold">
                            {{ $isNew ? 'Lengkapi Profil Sekolah' : 'Ubah Profil Sekolah' }}
                        </h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('schools.update', $school) }}" method="post">
                            @csrf
                            @method('PUT')
                            @include('admin.schools._form', ['school' => $school])
                            <div class="d-flex gap-2 mt-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ $isNew ? 'Simpan & Mulai' : 'Simpan perubahan' }}
                                </button>
                                @if (!$isNew)
                                    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary" wire:navigate>Batal</a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
