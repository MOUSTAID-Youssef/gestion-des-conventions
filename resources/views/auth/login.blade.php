<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('photos/favicon.png') }}">
    <!-- Font Awesome for icons -->
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
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

        /* Alerts container */
        .alerts-container {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 90%;
            max-width: 500px;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: center; /* Center alerts horizontally within container */
        }

        /* Base alert styling */
        .alert {
            padding: 15px;
            padding-right: 40px; /* Extra padding on right for close button */
            margin: 0;
            border-radius: 8px;
            font-size: 16px;
            display: inline-block; /* Makes alert size match content */
            box-sizing: border-box;
            -webkit-box-sizing: border-box; /* Safari/Chrome */
            -moz-box-sizing: border-box; /* Firefox */
            position: relative; /* For positioning the close button */
        }

        /* Ensure custom.css styles are applied */
        .alert {
            font-weight: bold;
            border-radius: 0.5rem;
        }
        .alert i {
            margin-right: 10px;
        }

        /* Style for alert content to prevent overlap */
        .alert .content {
            display: inline-block;
            vertical-align: middle;
        }

        /* Position the close button */
        .alert .btn-close {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            padding: 0;
            margin: 0;
            opacity: 0.8;
        }

        /* Override custom.css defaults for alert-danger */
        .alert-danger {
            background-color: #f8d7da !important;
            color: #721c24 !important;
            border-color: #f5c6cb !important;
        }

        /* Ensure alert-success keeps green */
        .alert-success {
            background-color: #d4edda !important;
            color: #155724 !important;
            border-color: #c3e6cb !important;
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

        /* Responsive adjustments */
        @media (max-width: 576px) {
            .card {
                width: 90%;
            }
            .alerts-container {
                width: 95%;
                top: 10px;
            }
            .alert {
                font-size: 14px;
            }
        }

        @media (max-width: 400px) {
            .card {
                width: 100%;
                margin: 10px;
            }
            .alerts-container {
                width: 98%;
            }
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center" style="height: 100vh;">

    <!-- Background layer with blur -->
    <div class="background"></div>

    <!-- Alerts Container -->
    <div class="alerts-container">
        <!-- Success Message Alert -->
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="content"><i class="fas fa-check-circle"></i> {{ session('success') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Error Message Alerts -->
        @error('error')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span class="content"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror

        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span class="content"><i class="fas fa-exclamation-circle"></i> {{ session('error') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <!-- Login Card -->
    <div class="card shadow-lg p-4">
        <div class="card-header text-center">Gestion des interventions de la société WATEC</div>
        <!-- From Uiverse.io by alexruix -->
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