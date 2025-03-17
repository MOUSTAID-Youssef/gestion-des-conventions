@extends('layouts.app')

@section('content')
    <div class="alert alert-danger" style="margin: 50px; padding: 20px; background-color: #f8d7da; color: #721c24; border-radius: 8px; border: 1px solid #f5c6cb;">
        <h4 style="font-size: 24px; font-weight: bold;">Vous n'êtes pas autorisé à voir cette page.</h4>
        <p style="font-size: 18px; line-height: 1.5;">Vous serez redirigé vers la page d'accueil après <span id="countdown">5</span> secondes...</p>
    </div>

    <script>
        let countdown = 5; // Temps initial de 5 secondes
        const countdownElement = document.getElementById('countdown');

        const timer = setInterval(function() {
            countdown--;
            countdownElement.innerText = countdown;

            if (countdown <= 0) {
                clearInterval(timer);
                window.location.href = '{{ url('/') }}'; // Redirection vers la page d'accueil
            }
        }, 1000); // Mise à jour toutes les secondes
    </script>
@endsection
