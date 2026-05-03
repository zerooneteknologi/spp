<div style="width:100%; max-width: 380px;">

    <h3 class="fw-bold mb-2 text-center" style="color:#34495E;">Selamat Datang</h3>
    <p class="text-center text-muted small mb-4">Masuk ke Dashboard Zero One</p>
    @if (session()->has('status'))
    <div class="alert alert-success small">
        {{ 'Kami Telah Mengirimkan email untuk reset password, Silahkan cek email anda!' }}
    </div>
    @endif

    <form class="row g-3 needs-validation" novalidate wire:submit.prevent="submit" x-data="{ show: false }">
        @csrf

        <div class="col-12">
            <label for="email" class="form-label small fw-semibold" style="color: #8E54A2;">Alamat Email</label>
            <div class="input-group has-validation">
                <input name="email" wire:model="email" type="email"
                    class="form-control rounded-5 border-muted @error('email') is-invalid @enderror" id="email"
                    placeholder="nama@email.com" required>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <label for="password" class="form-label small fw-semibold" style="color: #8E54A2;">Password</label>
            <div class="input-group has-validation">
                <input name="password" wire:model="password" :type="show ? 'text' : 'password'"
                    class="form-control rounded-start-5 border-muted @error('password') is-invalid @enderror"
                    id="password" placeholder="••••••••" autocomplete="off" required>
                <span class="input-group-text rounded-end-5 bg-white border-start-0" @click="show = !show"
                    style="cursor:pointer">
                    <i :class="show ? 'bi bi-eye' : 'bi bi-eye-slash'" style="color: #3BA9D6;"></i>
                </span>
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-12 d-flex justify-content-between align-items-center mt-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label small text-muted" for="remember">Ingat saya</label>
            </div>
            <a wire:navigate href="{{ route('password.request') }}" class="small text-decoration-none"
                style="color: #3BA9D6;">Lupa
                Password?</a>
        </div>

        <div class="col-12 d-grid mt-4">
            <button class="btn border-0 text-white rounded-5 py-2 fw-bold" type="submit"
                style="background: linear-gradient(135deg, #8E54A2 0%, #3BA9D6 100%); transition: 0.3s opacity;">
                LOG IN
            </button>
        </div>
        <p class="text-center small text-muted italic">Belum punya akun? <a wire:navigate
                href="{{ route('register')}}">Daftar Disini</a></p>
    </form>

</div>