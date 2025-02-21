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
