@extends('layouts.app')

@section('content')
    <div style="margin-left: 18px; text-align:center">
        <div class="d-flex align-items-center justify-content-between" style="margin-bottom: 15px;">
            <h1 class="me-3">Liste des Villes</h1>
            <a href="{{ route('ville.create') }}" class="btn btn-success">
                <i class="fa-solid fa-plus"></i> Ajouter une ville
            </a>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($villes->isEmpty())
        <p class="alert alert-warning" style="background-color: #f8d7da; color: #721c24;">La liste est vide</p>
    @else
        <div class="table-container">
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>latitude</th>
                    <th>longitude</th>
                    <th>latitude1</th>
                    <th>latitude2</th>
                    <th>longitude1</th>
                    <th>longitude2</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($villes as $ville)
                    <tr>
                        <td>{{ $ville->id }}</td>
                        <td>{{ $ville->nom }}</td>
                        <td>{{ $ville->latitude }}</td>
                        <td>{{ $ville->longitude }}</td>
                        <td>{{ $ville->lat1 }}</td>
                        <td>{{ $ville->lat2 }}</td>
                        <td>{{ $ville->lng1 }}</td>
                        <td>{{ $ville->lng2 }}</td>
                        <td><a href="{{ route('ville.edit', ['ville' => $ville]) }}"><button class="btn btn-warning"><i
                                        class="fas fa-edit"></i></button></a></td>
                        <td>
                            <form action="{{ route('ville.delete', ['ville' => $ville]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection