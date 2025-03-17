@extends('layouts.app')

@section('content')
    <div style="margin-left:10px">
        <h2>Localisation des interventions</h2>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div id="map" style="height: 500px; width: 100%;"></div>

        <script>
            function initMap() {
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 6,
                    center: {
                        lat: 31.7917,
                        lng: -7.0926
                    }
                });

                var interventions = @json($interventions);
                var currentInfoWindow = null; // To store the currently open infoWindow

                interventions.forEach(function(intervention) {
                    var marker = new google.maps.Marker({
                        position: {
                            lat: parseFloat(intervention.latitude),
                            lng: parseFloat(intervention.longitude)
                        },
                        map: map,
                        title: intervention.libelle
                    });

                    var contentString = `
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Intervention <span style="color: #007bff;">N°${intervention.id}</span> </h5>
                            <p class="card-text"><strong>Utilisateur:</strong> ${intervention.utilisateur ? intervention.utilisateur.login : ''}</p>
                            <p class="card-text"><strong>Libellé:</strong> ${intervention.libelle ? intervention.libelle : 'Sans Libellé'}</p>
                            <p class="card-text"><strong>Equipe:</strong> ${intervention.equipe.designation}</p>
                            <p class="card-text"><strong>Type:</strong> ${intervention.type.designation}</p>
                            <p class="card-text"><strong>Cause:</strong> ${intervention.cause.designation}</p>
                            <p class="card-text"><strong>Adresse:</strong> ${intervention.adresse}</p>
                            <p class="card-text"><strong>Date:</strong> ${intervention.date_intervention}</p>
                            <p class="card-text"><strong>Ville:</strong> ${intervention.ville ? intervention.ville.nom : ''}</p>
                            ${intervention.photo ? `<img src="/storage/${intervention.photo}" style="width: 100px; height: 100px;"/>` : ''}
                        </div>
                    </div>
                `;

                    var infoWindow = new google.maps.InfoWindow({
                        content: contentString
                    });

                    // Add a click event to the marker to toggle the InfoWindow
                    marker.addListener('click', function() {
                        // If there's already an info window open, close it
                        if (currentInfoWindow) {
                            currentInfoWindow.close();
                        }

                        // Open the new info window
                        infoWindow.open(map, marker);

                        // Update the currentInfoWindow to the one just opened
                        currentInfoWindow = infoWindow;
                    });
                });
            }
        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer>
        </script>
    </div>
@endsection
