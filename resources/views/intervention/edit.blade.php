@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 800px;">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="me-3">Modifier l'intervention: <span style="color: blue;">{{ $intervention->id }}</span>
            </h1>
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

        <div id="map" style="height: 400px; width: 100%; margin-bottom:15px"></div>

        <form action="{{ route('intervention.update', ['intervention' => $intervention]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- <input type="number" class="form-control" id="id_utilisateur" name="id_utilisateur"
                value="{{ $intervention->id_utilisateur }}" hidden readonly required> --}}
            <div class="row mb-2">
                <label for="longitude" class="col-md-4 col-form-label">Longitude *</label>
                <div class="col-md-8">
                    <input type="number" class="form-control" id="longitude" name="longitude"
                        value="{{ $intervention->longitude }}" readonly required>
                </div>
            </div>
            <div class="row mb-2">
                <label for="latitude" class="col-md-4 col-form-label">Latitude *</label>
                <div class="col-md-8">
                    <input type="number" class="form-control" id="latitude" name="latitude"
                        value="{{ $intervention->latitude }}" readonly required>
                </div>
            </div>

            <div class="row mb-2">
                <label for="libelle" class="col-md-4 col-form-label">Libellé</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="libelle" name="libelle"
                        value="{{ $intervention->libelle }}">
                </div>
            </div>

            <div class="row mb-2">
                <label for="id_ville" class="col-md-4 col-form-label">Ville *</label>
                <div class="col-md-8">
                    <select class="form-select" name="id_ville" id="id_ville" required>
                        @foreach ($villes as $ville)
                            <option value="{{ $ville->id }}" @selected($ville->id == $intervention->id_ville)>{{ $ville->nom }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="row mb-2">
                <label for="adresse" class="col-md-4 col-form-label">Adresse *</label>
                <div class="col-md-8">
                    <textarea type="text" class="form-control" id="adresse" name="adresse">{{ $intervention->adresse }}</textarea>
                </div>
            </div>

            <div class="row mb-2">
                <label for="date_intervention" class="col-md-4 col-form-label">Date *</label>
                <div class="col-md-8">
                    <input type="date" class="form-control" id="date_intervention" name="date_intervention"
                        value="{{ $intervention->date_intervention }}" required>
                </div>
            </div>

            <div class="row mb-2">
                <label for="type" class="col-md-4 col-form-label">Type *</label>
                <div class="col-md-8">
                    <select class="form-select" name="id_type_intervention" id="type" required>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" @selected($type->id == $intervention->id_type_intervention)>{{ $type->designation }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-2">
                <label for="cause" class="col-md-4 col-form-label">Cause *</label>
                <div class="col-md-8">
                    <select class="form-select" name="id_cause" id="cause" required>
                        @foreach ($causes as $cause)
                            <option value="{{ $cause->id }}" @selected($cause->id == $intervention->id_cause)>{{ $cause->designation }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-2">
                <label for="equipe" class="col-md-4 col-form-label">Equipe *</label>
                <div class="col-md-8">
                    <select class="form-select" name="id_equipe" id="equipe" required>
                        @foreach ($equipes as $equipe)
                            <option value="{{ $equipe->id }}" @selected($equipe->id == $intervention->id_equipe)>{{ $equipe->designation }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Photo upload section -->
            <div class="row mb-2">
                <label for="photo" class="col-md-4 col-form-label">Photo</label>
                <div class="col-md-8">
                    <!-- Display the current photo if exists -->
                    @if ($intervention->photo)
                        <div>
                            <img src="{{ asset('storage/' . $intervention->photo) }}" alt="Current Photo" width="150"
                                height="150">
                        </div>
                    @endif
                    <input type="file" class="form-control" id="photo" name="photo">
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

    <script>
        let map;
        let marker;

        function initMap() {
            const lat = parseFloat(document.getElementById('latitude').value) || null;
            const lng = parseFloat(document.getElementById('longitude').value) || null;


            map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: lat,
                    lng: lng
                },
                zoom: 12
            });

            marker = new google.maps.Marker({
                position: {
                    lat: lat,
                    lng: lng
                },
                map: map,
                draggable: true
            });

            // Mettre à jour les champs lors du déplacement du marqueur
            google.maps.event.addListener(marker, 'dragend', function(event) {
                document.getElementById('latitude').value = event.latLng.lat();
                document.getElementById('longitude').value = event.latLng.lng();
            });

            // Ajouter un événement de clic sur la carte
            google.maps.event.addListener(map, 'click', function(event) {
                let clickedLat = event.latLng.lat();
                let clickedLng = event.latLng.lng();

                // Mettre à jour le marqueur existant
                marker.setPosition(event.latLng);

                // Remplir les champs latitude et longitude
                document.getElementById('latitude').value = clickedLat;
                document.getElementById('longitude').value = clickedLng;
            });
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async
        defer></script>
@endsection
