@extends('layouts.app')

@section('content')
    <div style="margin-left: 18px;text-align:center">

        <div class="d-flex align-items-center justify-content-between" style="margin-bottom: 15px;">
            <h1 class="me-3">Liste des types de fuite</h1>
            <a href="{{ route('type.create') }}" class="btn btn-success">
                <i class="fa-solid fa-plus"></i> Ajouter type de fuite
            </a>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <table class="table table-striped table-fixed">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Désignation</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <td>{{ $type->id }}</td>
                        <td>{{ $type->designation }}</td>
                        <td><a href="{{ route('type.edit', ['type' => $type]) }}"><button class="btn btn-warning"><i
                                        class="fas fa-edit"></i></button></a></td>
                        <td>
                            <form action="{{ route('type.delete', ['type' => $type]) }}" method="POST">
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
        <div>
        @endsection
