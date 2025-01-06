{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


@extends('../layout')

@section('content')

<main class="main">



    <!-- login area -->
    <div class="login-area pt-30 pb-50" style="background-color: #cbdcf6b0;">
        <div class="container">
            <div class="col-md-7 col-lg-5 mx-auto">
                <div class="login-form">
                    <div class="login-header">
                        <h3>Login</h3>
                    </div>
                    <form method="POST" action="{{ route('login') }}" >
                        @csrf
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" id="email" name="email" value="{{old('email')}}" class="form-control" required autofocus autocomplete="username" >
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" >
                        </div>
                        <div class="d-flex justify-content-between mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="remember">
                                <label class="form-check-label" for="remember">
                                    Remember Me
                                </label>
                            </div>
                            <!-- <a href="forgot-password.php" class="forgot-pass">Forgot Password?</a> -->
                        </div>
                        <div class="d-flex align-items-center">
                            <button type="submit" class="theme-btn theme-btn2"><i class="far fa-sign-in"></i> Login</button>
                        </div>
                    </form>
                    <div class="login-footer">
                        <p>Don't have an account? <a href="{{route('register')}}">Register.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login area end -->

</main>

@endsection