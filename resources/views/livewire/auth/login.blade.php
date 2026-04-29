<div class="container d-flex flex-column justify-content-center align-items-center vh-100">

    <div class="mb-4 text-center">
        <img src="{{ asset('asset/img/logo/ZeroOne.ico') }}" alt="Zero One Logo" class="img-fluid"
            style="max-height: 110px; filter: drop-shadow(0px 4px 10px rgba(0,0,0,0.1));">
    </div>

    <div class="card border-0 rounded-4 shadow-lg" style="max-width: 22rem; width: 100%;">
        <div class="card-body p-4">
            <h3 class="card-title text-center fw-bold" style="color: #34495E;">Selamat Datang</h3>
            <div class="text-center mb-4">
                <p class="text-secondary small">Masuk ke Dashboard Zero One</p>
                {{-- <h3 class="fw-bold text-white mb-1">Welcome Back</h3> --}}
            </div>

            <form class="row g-3 needs-validation" novalidate wire:submit.prevent="submit" x-data="{ show: false }">
                @csrf

                <div class="col-12">
                    <label for="email" class="form-label small fw-semibold" style="color: #8E54A2;">Email
                        Address</label>
                    <div class="input-group has-validation">
                        <input name="email" wire:model="email" type="email"
                            class="form-control rounded-5 border-muted @error('email') is-invalid @enderror" id="email"
                            placeholder="name@company.com" required>
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
                    <a href="#" class="small text-decoration-none" style="color: #3BA9D6;">Lupa Password?</a>
                </div>

                <div class="col-12 d-grid mt-4">
                    <button class="btn border-0 text-white rounded-5 py-2 fw-bold" type="submit"
                        style="background: linear-gradient(135deg, #8E54A2 0%, #3BA9D6 100%); transition: 0.3s opacity;">
                        LOG IN
                    </button>
                </div>
                <p class="text-center m-0 small text-muted italic">don't limit yourself</p>
            </form>
        </div>
    </div>

</div>