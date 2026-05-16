<div class="container-fluid mt-4">
  @include('partials.flash')

  <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Rencana DSP</li>
    </ol>
  </nav>

  <div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
      <h1 class="h5 mb-0 fw-bold">Daftar Rencana DSP</h1>
      <a href="{{ route('dsp-plans.create') }}" class="btn btn-primary btn-sm" wire:navigate>
        Tambah Rencana
      </a>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
          <thead class="table-light">
            <tr>
              <th scope="col" class="ps-4">Tahun Ajaran</th>
              <th scope="col">Total Biaya (Rp)</th>
              <th scope="col">Jumlah Cicilan</th>
              <th scope="col" class="text-end pe-4">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($dspPlans as $plan)
            <tr>
              <td class="ps-4 fw-medium">{{ $plan->academicYear->name ?? '-' }}</td>
              <td>Rp {{ number_format($plan->total_amount, 0, ',', '.') }}</td>
              <td>{{ $plan->installment_count }} Kali</td>
              <td class="text-end pe-4">
                <a href="{{ route('dsp-plans.edit', $plan->id) }}" class="btn btn-sm btn-outline-primary" wire:navigate>Edit & Rincian</a>
                <button type="button" class="btn btn-sm btn-outline-danger ms-1" wire:click="delete({{ $plan->id }})" wire:confirm="Apakah Anda yakin ingin menghapus rencana DSP ini beserta semua rincian cicilannya?">Hapus</button>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="4" class="text-center py-4 text-muted">Belum ada data rencana DSP.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
