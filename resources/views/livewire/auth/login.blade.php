<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {

    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        // dd($this->email);
        $this->validate();

        $this->ensureIsNotRateLimited();


        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($this->throttleKey());
            
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }
        
        RateLimiter::clear($this->throttleKey());
        Session::regenerate();
        // $user = Auth::user()->name;
        
        // 🔥 Tambahkan event Livewire untuk SweetAlert
        $this->dispatch('success-login', message: 'Berhasil login, ' , name:Auth::user()->name);

    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }
}; ?>


   <div class="card shadow-lg border-0 overflow-hidden" style="width: 100%; max-width: 100%; border-radius: 1rem;">
    <div class="row g-0">
        <div class="col-md-5 login-left d-none d-md-flex align-items-center justify-content-center text-white p-4"
            style="background: linear-gradient(135deg, #0d6efd, #00bfff);">
            <div class="text-center">
                <h2 class="fw-bold">SIMDOTIPPS</h2>
                <p class="mt-3">Sistem Monitoring Dana Otsus & DTI.</p>
            </div>
        </div>
        <div class="col-md-7 p-5">
            <div class="text-center mb-4">
                <h3 class="fw-bold display-6">Masuk</h3>
                <p class="text-muted">Lanjutkan dengan akun OPD Anda</p>
            </div>
            <form wire:submit.prevent="login">
                <div class="mb-3">
                    <label for="email" class="form-label visually-hidden">Alamat Email</label>
                    <input type="email" wire:model="email" class="form-control form-control-lg"
                        placeholder="Alamat Email" required>
                    @error('email')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label visually-hidden">Kata Sandi</label>
                    <input type="password" wire:model="password" class="form-control form-control-lg"
                        placeholder="Kata Sandi" required>
                    @error('password')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" wire:model="remember" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">
                            {{ __('Remember me') }}
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold" data-test="login-button">
                    <span wire:loading.remove wire:target="login">Login</span>
                    <span wire:loading wire:target="login">
                    </span>
                </button>
            </form>

            <div class="text-center mt-3">
                <a href="#" class="text-decoration-none text-muted small">Lupa Kata Sandi?</a>
            </div>
        </div>
    </div>
</div>
