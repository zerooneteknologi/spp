<div class="row g-3">
    <div class="col-md-6">
        <label for="name" class="form-label">Nama sekolah</label>
        <input type="text" id="name" name="name"
            class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name', $school->name) }}" required maxlength="255">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email"
            class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email', $school->email) }}" required maxlength="255">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="phone" class="form-label">Telepon</label>
        <input type="text" id="phone" name="phone"
            class="form-control @error('phone') is-invalid @enderror"
            value="{{ old('phone', $school->phone) }}" maxlength="50">
        @error('phone')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="status" class="form-label">Status</label>
        <select id="status" name="status" class="form-select @error('status') is-invalid @enderror" required>
            @php $st = old('status', $school->status ?? 'active'); @endphp
            <option value="active" @selected($st === 'active')>Aktif</option>
            <option value="inactive" @selected($st === 'inactive')>Tidak aktif</option>
        </select>
        @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label for="address" class="form-label">Alamat</label>
        <textarea id="address" name="address" rows="3"
            class="form-control @error('address') is-invalid @enderror">{{ old('address', $school->address) }}</textarea>
        @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
