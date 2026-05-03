<div style="width:100%; max-width:380px;">

    <h3 class="fw-bold text-center mb-2">Ubah Password</h3>
    <p class="text-center text-muted small mb-4">
        masukan password baru anda
    </p>

    @if (session()->has('status'))
    <div class="alert alert-success small">
        {{ session('status') }}
    </div>
    @endif

    <form wire:submit.prevent="resetPassword" x-data="{ show:false, showConfirm:false }">

        <input type="hidden" wire:model="token">

        <div class="mb-2">
            <label for="email" class="form-label small fw-semibold" style="color: #8E54A2;">Email
                Address</label>
            <div class="input-group">
                <input type="email" wire:model="email"
                    class="form-control rounded-5 border-muted @error('email') is-invalid @enderror"
                    placeholder="email@example.com">
                @error('email')
                <span class="invalid-feedback d-block">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mb-2">
            <label for="password" class="form-label small fw-semibold" style="color: #8E54A2;">Password</label>
            <div class="input-group">
                <input :type="show ? 'text':'password'" wire:model="password"
                    class="form-control rounded-start-5 @error('password') is-invalid @enderror"
                    placeholder="Password baru">
                <span class="input-group-text rounded-end-5 bg-white border-start-0" @click="show = !show"
                    style="cursor:pointer">
                    <i :class="show ? 'bi bi-eye' : 'bi bi-eye-slash'" style="color: #3BA9D6;"></i>
                </span>
                @error('password')
                <span class="invalid-feedback d-block">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="mb-2">
            <label class="form-label small fw-semibold" style="color: #8E54A2;">Konfirmasi Password</label>
            <div class="input-group">
                <input :type="showConfirm ? 'text':'password'" wire:model="password_confirmation"
                    class="form-control rounded-start-5" placeholder="Konfirmasi password">
                <span class="input-group-text rounded-end-5 bg-white border-start-0" @click="showConfirm=!showConfirm"
                    style="cursor:pointer">
                    <i :class="showConfirm ? 'bi bi-eye' : 'bi bi-eye-slash'" style="color: #3BA9D6;"></i>
                </span>
            </div>
        </div>

        <div class="d-grid">
            <button class="btn text-white fw-bold rounded-5 py-2 mt-3"
                style="background: linear-gradient(135deg, #8E54A2 0%, #3BA9D6 100%); transition: 0.3s opacity;">RESET
                PASSWORD
            </button>
        </div>
    </form>

</div>