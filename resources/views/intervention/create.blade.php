@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 900px;">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="me-3">Ajouter une intervention</h1>
            <a href="{{ route('intervention.index') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Retour à la liste
            </a>
        </div>

        @if ($errors->any())
            <div>
                <ul style="color: red; font-weight: bold;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }} ⚠</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="d-flex justify-content-between">
            <!-- Carte Google Maps -->
            <div id="map" style="height: 500px; width: 48%;"></div>

            <!-- Formulaire -->
            <form action="{{ route('intervention.store') }}" method="POST" enctype="multipart/form-data" style="width: 48%;">
                @csrf

                <div class="row mb-2">
                    <label for="id_utilisateur" class="col-md-4 col-form-label">id_utilisateur temp</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control" id="id_utilisateur" name="id_utilisateur" step="1" required>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="longitude" class="col-md-4 col-form-label">Longitude *</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control" id="longitude" name="longitude" readonly required>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="latitude" class="col-md-4 col-form-label">Latitude *</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control" id="latitude" name="latitude" readonly required>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="libelle" class="col-md-4 col-form-label">Libellé</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="libelle" name="libelle">
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="id_ville" class="col-md-4 col-form-label">Ville *</label>
                    <div class="col-md-8">
                        <select class="form-select" name="id_ville" id="id_ville" required>
                            @foreach ($villes as $ville)
                                <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="adresse" class="col-md-4 col-form-label">Adresse *</label>
                    <div class="col-md-8">
                        <textarea type="text" class="form-control" id="adresse" name="adresse"></textarea>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="date_intervention" class="col-md-4 col-form-label">Date *</label>
                    <div class="col-md-8">
                        <input type="date" class="form-control" id="date_intervention" name="date_intervention" required>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="type" class="col-md-4 col-form-label">Type *</label>
                    <div class="col-md-8">
                        <select class="form-select" name="id_type_intervention" id="type" required>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->designation }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="cause" class="col-md-4 col-form-label">Cause *</label>
                    <div class="col-md-8">
                        <select class="form-select" name="id_cause" id="cause" required>
                            @foreach ($causes as $cause)
                                <option value="{{ $cause->id }}">{{ $cause->designation }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="equipe" class="col-md-4 col-form-label">Equipe *</label>
                    <div class="col-md-8">
                        <select class="form-select" name="id_equipe" id="equipe" required>
                            @foreach ($equipes as $equipe)
                                <option value="{{ $equipe->id }}">{{ $equipe->designation }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="photo" class="col-md-4 col-form-label">Photo</label>
                    <div class="col-md-8">
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <button type="reset" class="btn btn-secondary w-48">
                        <i class="fas fa-undo"></i> Réinitialiser
                    </button>
                    <button type="submit" class="btn btn-success w-48">
                        <i class="fas fa-save"></i> Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let map;
        let marker;

        function initMap() {
            const lat = parseFloat(document.getElementById('latitude').value) || 33.5731;
            const lng = parseFloat(document.getElementById('longitude').value) || -7.5898;

            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: lat, lng: lng },
                zoom: 10
            });

            marker = new google.maps.Marker({
                position: { lat: lat, lng: lng },
                map: null, // Hide marker initially
                draggable: true
            });

            google.maps.event.addListener(marker, 'dragend', function(event) {
                document.getElementById('latitude').value = event.latLng.lat();
                document.getElementById('longitude').value = event.latLng.lng();
            });

            google.maps.event.addListener(map, 'click', function(event) {
                let clickedLat = event.latLng.lat();
                let clickedLng = event.latLng.lng();

                marker.setPosition(event.latLng);
                marker.setMap(map); // Show marker when clicking on the map

                document.getElementById('latitude').value = clickedLat;
                document.getElementById('longitude').value = clickedLng;
            });
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
@endsection
