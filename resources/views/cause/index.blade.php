@extends('layouts.app')

@section('content')
    <div style="margin-left: 18px;text-align:center">

        <div class="d-flex align-items-center justify-content-between" style="margin-bottom: 15px;">
            <h1 class="me-3">Liste des causes d'intervention</h1>
            <a href="{{ route('cause.create') }}" class="btn btn-success">
                <i class="fa-solid fa-plus"></i> Ajouter une cause d'intervention
            </a>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($causes->isEmpty())
            <p class="alert alert-warning" style="background-color: #f8d7da; color: #721c24;">La liste est vide</p>
        @else
            <div class="table-container">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Désignation</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($causes as $cause)
                            <tr>
                                <td>{{ $cause->id }}</td>
                                <td>{{ $cause->designation }}</td>
                                <td><a href="{{ route('cause.edit', ['cause' => $cause]) }}"><button
                                            class="btn btn-warning"><i class="fas fa-edit"></i></button></a></td>
                                <td>
                                    <form action="{{ route('cause.delete', ['cause' => $cause]) }}" method="POST">
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
