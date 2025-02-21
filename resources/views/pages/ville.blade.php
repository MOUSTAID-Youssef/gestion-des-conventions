@extends('layouts.app')

@section('content')
<div style="margin-left: 18px;text-align:center" >

    <div class="d-flex align-items-center justify-content-between" style="margin-bottom: 15px;">
        <h1 class="me-3">Liste des villes</h1>
        <a href="" class="btn btn-success">
            <i class="fas fa-user-plus"></i> Ajouter ville
        </a>
    </div>
    <table class="table table-striped table-fixed">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom Ville</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Fuite sur Branchement</td>
                <td><button class="btn btn-warning"><i class="fas fa-edit"></i></button></td>
                <td><button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
            </tr>
        </tbody>
    </table>
    <div>
@endsection


