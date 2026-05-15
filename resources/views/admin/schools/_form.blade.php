<div class="row g-3">
    @php
    $wireEnabled = $wire ?? false;
    $nameValue = $wireEnabled ? $name : old('name', $school->name);
    $emailValue = $wireEnabled ? $email : old('email', $school->email);
    $phoneValue = $wireEnabled ? $phone : old('phone', $school->phone);
    $statusValue = $wireEnabled ? $status : old('status', $school->status ?? 'active');
    $addressValue = $wireEnabled ? $address : old('address', $school->address);
    @endphp
    <div class="col-md-6">
        <label for="name" class="form-label">Nama sekolah <span class="text-danger">*</span></label>
        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
            @if($wireEnabled) wire:model.defer="name" @endif value="{{ $nameValue }}" required maxlength="255">
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
            @if($wireEnabled) wire:model.defer="email" @endif @disabled($disableEmail ?? false)
            value="{{ $emailValue }}" required maxlength="255">
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="phone" class="form-label">Telepon</label>
        <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror"
            @if($wireEnabled) wire:model.defer="phone" @endif value="{{ $phoneValue }}" maxlength="50">
        @error('phone')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
        <select id="status" name="status" class="form-select @error('status') is-invalid @enderror" required
            @if($wireEnabled) wire:model.defer="status" @endif @disabled($disableStatus ?? false)>
            @php $st = $statusValue; @endphp
            <option value="active" @selected($st==='active' )>Aktif</option>
            <option value="inactive" @selected($st==='inactive' )>Tidak aktif</option>
        </select>
        @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label for="address" class="form-label">Alamat</label>
        <textarea id="address" name="address" rows="3" class="form-control @error('address') is-invalid @enderror"
            @if($wireEnabled) wire:model.defer="address" @endif>{{ $addressValue }}</textarea>
        @error('address')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>