<div class="container-fluid mt-4">
  @include('partials.flash')

  <nav
    style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
    aria-label="breadcrumb">
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Profil Sekolah</li>
    </ol>
  </nav>

  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3">
          <h1 class="h5 mb-0 fw-bold">
            {{ empty($school->phone) && empty($school->address) ? 'Lengkapi Profil Sekolah' : 'Ubah Profil Sekolah' }}
          </h1>
        </div>
        <div class="card-body">
          <form wire:submit.prevent="save">
            @include('admin.schools._form', ['school' => $school, 'wire' => true, 'disableEmail' => true,
            'disableStatus' => true])
            <div class="d-flex gap-2 mt-4">
              <button type="submit" class="btn btn-primary">
                {{ empty($school->phone) && empty($school->address) ? 'Simpan & Mulai' : 'Simpan perubahan' }}
              </button>
              @if (!empty($school->phone) || !empty($school->address))
              <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary" wire:navigate>Batal</a>
              @endif
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>