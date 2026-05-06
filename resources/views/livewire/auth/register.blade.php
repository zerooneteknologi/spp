<div style="width:100%; max-width: 380px;">

    <h3 class="fw-bold mb-2 text-center" style="color:#34495E;">Daftar Akun</h3>
    <p class="text-center text-muted small mb-4">Buat akun baru</p>

    <form wire:submit.prevent="register" x-data="{ show:false, showConfirm:false }">

        {{-- SCHOOL NAME --}}
        <div class="mb-3">
            <label class="form-label small fw-semibold" style="color: #8E54A2;">Sekolah</label>
            <input type="text" autofocus wire:model.defer="school_name" class="form-control rounded-5 @error('school_name') is-invalid @enderror"
                placeholder="Nama sekolah" maxlength="255">

            @error('school_name')
                <span class="invalid-feedback d-block">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- NAME --}}
        <div class="mb-3">
            <label class="form-label small fw-semibold" style="color: #8E54A2;">Nama</label>
            <input type="text" wire:model.defer="name" value="{{ old('name') }}" autocomplete="name" class="form-control rounded-5 @error('name') is-invalid @enderror" placeholder="Masukkan nama">

            @error('name')
            <span class="invalid-feedback d-block">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        {{-- EMAIL --}}
        <div class="mb-3">
            <label class="form-label small fw-semibold" style="color: #8E54A2;">Alamat Email</label>
            <input type="email" wire:model.defer="email" value="{{ old('email') }}" autocomplete="email"
                class="form-control rounded-5 @error('email') is-invalid @enderror" placeholder="nama@email.com">

            @error('email')
            <span class="invalid-feedback d-block">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        {{-- PASSWORD --}}
        <div class="mb-3">
            <label class="form-label small fw-semibold" style="color: #8E54A2;">Password</label>
            <div class="input-group">
                <input :type="show ? 'text':'password'" wire:model.defer="password" autocomplete="new-password"
                    class="form-control rounded-start-5  @error('password') is-invalid @enderror"
                    placeholder="••••••••">

                <span class="input-group-text rounded-end-5 bg-white border-start-0" @click="show=!show"
                    style="cursor:pointer">
                    <i :class="show ? 'bi bi-eye' : 'bi bi-eye-slash'" style="color: #3BA9D6;"></i>
                </span>
            </div>

            @error('password')
            <span class="invalid-feedback d-block">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        {{-- CONFIRM PASSWORD --}}
        <div class="mb-4">
            <label class="form-label small fw-semibold" style="color: #8E54A2;">Konfirmasi Password</label>
            <div class="input-group">
                <input :type="showConfirm ? 'text':'password'" wire:model.defer="password_confirmation"
                    autocomplete="new-password" class="form-control rounded-start-5" placeholder="••••••••">

                <span class="input-group-text rounded-end-5 bg-white border-start-0" @click="showConfirm=!showConfirm"
                    style="cursor:pointer">
                    <i :class="showConfirm ? 'bi bi-eye' : 'bi bi-eye-slash'" style="color: #3BA9D6;"></i>
                </span>
            </div>
        </div>

        {{-- BUTTON --}}
        <div class="d-grid">
            <button type="submit" class="btn text-white fw-bold rounded-5 py-2"
                style="background: linear-gradient(135deg, #8E54A2 0%, #3BA9D6 100%); transition: 0.3s opacity;">
                {{ __('Register') }}
            </button>
        </div>

        <p class="text-center mt-3 small">
            Sudah punya akun?
            <a wire:navigate href="{{ route('login') }}" style="color:#3BA9D6;">Login</a>
        </p>

    </form>

</div>