<div class="mb-3">
    <label for="start_year" class="form-label fw-semibold">Tahun Mulai <span class="text-danger">*</span></label>
    <input type="number" wire:model.live="start_year" id="start_year" class="form-control @error('start_year') is-invalid @enderror" required placeholder="Contoh: 2024" min="2000" max="2099">
    @error('start_year')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="end_year" class="form-label fw-semibold">Tahun Selesai <span class="text-danger">*</span></label>
    <input type="number" wire:model="end_year" id="end_year" class="form-control @error('end_year') is-invalid @enderror" required placeholder="Contoh: 2025" min="2000" max="2099">
    @error('end_year')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="name" class="form-label fw-semibold">Nama Tahun Ajaran <span class="text-danger">*</span></label>
    <input type="text" wire:model="name" id="name" class="form-control @error('name') is-invalid @enderror" required placeholder="Contoh: 2024/2025">
    @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-4">
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" id="is_active" wire:model="is_active">
        <label class="form-check-label" for="is_active">Set Sebagai Tahun Ajaran Aktif</label>
    </div>
    <div class="form-text">Hanya boleh ada satu tahun ajaran yang aktif. Jika diaktifkan, tahun ajaran aktif sebelumnya akan dinonaktifkan.</div>
</div>
