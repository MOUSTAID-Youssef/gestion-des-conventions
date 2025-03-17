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
            background: url('storage/watec_cover.jpeg') no-repeat center center / cover;
            filter: blur(10px);
            z-index: -1;
        }

        /* Styling for alerts (Success & Error) */
        .alert {
            position: absolute;
            top: 10%;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            max-width: 400px;
            padding: 15px;
            margin: 0;
            border-radius: 8px;
            font-size: 16px;
            z-index: 10;
        }

        /* Card styling */
        .card {
            width: 400px;
            border-radius: 12px;
            background: rgba(0, 40, 85, 0.8);
            color: white;
        }

        .card-header {
            font-size: 24px;
            font-weight: bold;
        }

        .form-control {
            background: #E3F2FD;
            border: none;
            border-radius: 8px;
        }

        .btn-submit {
            background: #007bff;
            border-radius: 8px;
            font-weight: bold;
        }

        .btn-submit:hover {
            background: #0056b3;
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center" style="height: 100vh;">

    <!-- Background layer with blur -->
    <div class="background"></div>

    <!-- Success Message Alert (Positioned outside the form) -->
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Error Message Alert (Positioned outside the form) -->
    @error('error')
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @enderror

    <!-- Login Card -->
    <div class="card shadow-lg p-4">
        <div class="card-header text-center">Gestion des interventions de la société WATEC</div>
        <form method="POST" action="{{ route('utilisateur.login.submit') }}">
            @csrf
            <div class="mb-3">
                <label for="login" class="form-label">Login</label>
                <input type="text" name="login" id="login" class="form-control" value="{{ old('login') }}"
                    required autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <button type="submit" class="btn w-100 text-white fw-bold btn-submit">Connexion</button>
        </form>
    </div>

    <!-- Bootstrap JS (needed for the alert close functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
