<div class="row">
    <div class="col-md-4 mb-3">
        <label for="academic_year_id" class="form-label fw-semibold">Tahun Ajaran <span class="text-danger">*</span></label>
        <select wire:model="academic_year_id" id="academic_year_id" class="form-select @error('academic_year_id') is-invalid @enderror" required>
            <option value="">-- Pilih Tahun Ajaran --</option>
            @foreach($academicYears as $year)
                <option value="{{ $year->id }}">{{ $year->name }}</option>
            @endforeach
        </select>
        @error('academic_year_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4 mb-3">
        <label for="total_amount" class="form-label fw-semibold">Total Biaya DSP <span class="text-danger">*</span></label>
        <div class="input-group">
            <span class="input-group-text">Rp</span>
            <input type="text" wire:model.live.debounce.500ms="total_amount" id="total_amount" class="form-control @error('total_amount') is-invalid @enderror" required oninput="this.value = this.value.replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, '.')">
        </div>
        @error('total_amount') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4 mb-3">
        <label for="installment_count" class="form-label fw-semibold">Jumlah Cicilan <span class="text-danger">*</span></label>
        <input type="number" wire:model.live.debounce.500ms="installment_count" id="installment_count" class="form-control @error('installment_count') is-invalid @enderror" required min="1" max="24">
        @error('installment_count') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<hr class="my-4">

<h5 class="fw-bold mb-3">Review & Pengaturan Cicilan</h5>
<p class="text-muted small mb-3">Total biaya dibagi ke dalam jumlah cicilan. Anda dapat menyesuaikan nominal per cicilan atau menentukan tanggal jatuh tempo jika diperlukan.</p>

@if(count($installments) > 0)
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th style="width: 10%;">Cicilan Ke-</th>
                    <th style="width: 45%;">Nominal (Rp) <span class="text-danger">*</span></th>
                    <th style="width: 45%;">Jatuh Tempo (Opsional)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($installments as $index => $installment)
                <tr>
                    <td class="text-center fw-bold">{{ $index + 1 }}</td>
                    <td>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="text" wire:model.live="installments.{{ $index }}.amount" class="form-control @error('installments.'.$index.'.amount') is-invalid @enderror" required oninput="this.value = this.value.replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, '.')">
                        </div>
                        @error('installments.'.$index.'.amount') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </td>
                    <td>
                        <input type="date" wire:model="installments.{{ $index }}.due_date" class="form-control @error('installments.'.$index.'.due_date') is-invalid @enderror">
                        @error('installments.'.$index.'.due_date') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                @php
                    $sum = 0;
                    foreach($installments as $inst) {
                        $sum += (float) str_replace('.', '', $inst['amount']);
                    }
                    $totalFloat = (float) str_replace('.', '', $total_amount);
                @endphp
                <tr class="table-light fw-bold">
                    <td class="text-end">Total:</td>
                    <td class="{{ $sum != $totalFloat ? 'text-danger' : 'text-success' }}">
                        Rp {{ number_format($sum, 0, ',', '.') }}
                        @if($sum != $totalFloat)
                            <div class="small fw-normal mt-1">Harus sama dengan Total Biaya DSP (Rp {{ number_format($totalFloat, 0, ',', '.') }})</div>
                        @endif
                    </td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>
@else
    <div class="alert alert-info">Silakan masukkan Total Biaya dan Jumlah Cicilan terlebih dahulu.</div>
@endif
