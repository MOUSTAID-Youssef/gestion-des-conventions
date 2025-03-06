@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 800px;">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="me-3">Modifier la ville: <span style="color: blue;">{{ $ville->nom }}</span>
            </h1>
            <a href="{{ route('ville.index') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Retour à la liste
            </a>
        </div>

        @if ($errors->any())
            <div>
                <ul style="color: red; font-weight: bold;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('ville.update', ['ville' => $ville]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-2">
                <label for="nom" class="col-md-4 col-form-label">Nom *</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="nom" name="nom" value="{{$ville->nom}}" required>
                </div>
            </div>

            <div class="row mb-2">
                <label for="latitude" class="col-md-4 col-form-label">Latitude *</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="latitude" name="latitude" value="{{$ville->latitude}}" required>
                </div>
            </div>

            <div class="row mb-2">
                <label for="longitude" class="col-md-4 col-form-label">Longitude *</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="longitude" name="longitude" value="{{$ville->longitude}}" required>
                </div>
            </div>

            <div class="row mb-2">
                <label for="latitude1" class="col-md-4 col-form-label">Latitude1 *</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="lat1" name="lat1" value="{{$ville->lat1}}" required>
                </div>
            </div>

            <div class="row mb-2">
                <label for="latitude2" class="col-md-4 col-form-label">Latitude2 *</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="lat2" name="lat2" value="{{$ville->lat2}}" required>
                </div>
            </div>

            <div class="row mb-2">
                <label for="longitude1" class="col-md-4 col-form-label">Longitude1 *</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="lng1" name="lng1" value="{{$ville->lng1}}" required>
                </div>
            </div>

            <div class="row mb-2">
                <label for="longitude2" class="col-md-4 col-form-label">Longitude2 *</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="lng2" name="lng2" value="{{$ville->lng2}}" required>
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
@endsection
