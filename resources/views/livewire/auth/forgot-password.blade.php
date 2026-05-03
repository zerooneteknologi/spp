<div style="width:100%; max-width:380px;">

    <h3 class="fw-bold text-center mb-2">Lupa Password</h3>
    <p class="text-center text-muted small mb-4">
        Masukkan email untuk mendapatkan link reset
    </p>

    @if (session()->has('status'))
    <div class="alert alert-success small">
        {{ 'Kami Telah Mengirimkan email untuk reset password, Silahkan cek email anda!' }}
    </div>
    @endif

    <form wire:submit.prevent="sendLink">

        <div class="mb-3">
            <label class="form-label small fw-semibold" style="color: #8E54A2;">Alamat Email</label>
            <input type="email" wire:model.defer="email"
                class="form-control rounded-5 border-muted @error('email') is-invalid @enderror"
                placeholder="nama@email.com">

            @error('email')
            <span class="invalid-feedback d-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="d-grid">
            <button class="btn text-white fw-bold rounded-5"
                style="background: linear-gradient(135deg, #8E54A2 0%, #3BA9D6 100%); transition: 0.3s opacity;">
                KIRIM LINK RESET
            </button>
        </div>

        <p class="text-center mt-3 small">
            <a wire:navigate href="{{ route('login') }}">Kembali ke login</a>
        </p>

    </form>

</div>