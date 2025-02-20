<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - WATEC Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body class="d-flex align-items-center justify-content-center" style="height: 100vh; background: #003366;">

<div class="card shadow-lg p-4" style="width: 400px; border-radius: 12px; background: #002855; color: white;">
    <h3 class="text-center fw-bold mb-3">WATEC Distribution</h3>
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
