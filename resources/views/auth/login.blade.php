<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <p class="login-box-msg">{{ __('sign_in') }}</p>

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <!-- Email Address -->
        <div class="input-group mb-3">
            <x-text-input id="email" type="email" name="email" :value="old('email')" placeholder="{{ __('email') }}" required autofocus autocomplete="username" />
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="input-group mb-3">
            <x-text-input id="password" type="password" name="password" placeholder="{{ __('password') }}" required autocomplete="current-password" />
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">{{ __('remember_me') }}</label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <x-primary-button class="btn-block">{{ __('sign_in') }}</x-primary-button>
            </div>
            <!-- /.col -->
        </div>

    </form>
</x-guest-layout>
