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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('photos/favicon.png') }}">
    <style>
        /* Background container with blur effect */
        .background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: url('https://media.licdn.com/dms/image/v2/C4E1BAQEXROXD9tmDEg/company-background_10000/company-background_10000/0/1612366098158/watecdistribution_cover?e=2147483647&v=beta&t=5g-ukJUPdyDwc8n5VR-we38ZJ5sutgIPc2zZCU8F9xc') 
                        no-repeat center center / cover;
            filter: blur(10px); /* Apply blur effect */
            z-index: -1; /* Send it behind other content */
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center" style="height: 100vh;">

<!-- Background layer with blur -->
<div class="background"></div>

<div class="card shadow-lg p-4" style="width: 400px; border-radius: 12px; background: rgba(0, 40, 85, 0.8); color: white;">
    <h3 class="text-center fw-bold mb-3">Gestion des interventions de la société WATEC</h3>
    <form method="POST" action="">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Login</label>
            <input type="email" name="email" id="email" class="form-control rounded-3" required autofocus style="background: #E3F2FD; border: none;">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control rounded-3" required style="background: #E3F2FD; border: none;">
        </div>
        <button type="submit" class="btn w-100 text-white fw-bold rounded-3" style="background: #007bff;">Connexion</button>
    </form>
</div>

</body>
</html>