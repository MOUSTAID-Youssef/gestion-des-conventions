@extends('layouts.app')

@section('content')
<div style="margin-left: 18px;text-align:center" >

    <div class="d-flex align-items-center justify-content-between" style="margin-bottom: 15px;">
        <h1 class="me-3">Liste des membres</h1>
        <a href="" class="btn btn-success">
            <i class="fas fa-user-plus"></i> Ajouter
        </a>
    </div>
    
    

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>CIN</th>
                <th>Télephone</th>
                <th>Email</th>
                <th>Adresse</th>
                <th>Ville</th>
                <th>Statut</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>abdelali</td>
                <td>ghardgui</td>
                <td>BB2332</td>
                <td>064494949</td>
                <td>email@gmail.com</td>
                <td>Lot 282 , 3éme étage , zone ind. Sud-Quest </td>
                <td>Casa</td>
                <td>Actif</td>
                <td><button class="btn btn-warning"><i class="fas fa-edit"></i></button></td>
                <td><button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
            </tr>
            <tr>
                <td>abdelali</td>
                <td>ghardgui</td>
                <td>BB2332</td>
                <td>064494949</td>
                <td>email@gmail.com</td>
                <td>Lot 282 , 3éme étage , zone ind. Sud-Quest </td>
                <td>Casa</td>
                <td>Actif</td>
                <td><button class="btn btn-warning"><i class="fas fa-edit"></i></button></td>
                <td><button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
            </tr>
            <tr>
                <td>abdelali</td>
                <td>ghardgui</td>
                <td>BB2332</td>
                <td>064494949</td>
                <td>email@gmail.com</td>
                <td>Lot 282 , 3éme étage , zone ind. Sud-Quest </td>
                <td>Casa</td>
                <td>Actif</td>
                <td><button class="btn btn-warning"><i class="fas fa-edit"></i></button></td>
                <td><button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
            </tr>
            <tr>
                <td>abdelali</td>
                <td>ghardgui</td>
                <td>BB2332</td>
                <td>064494949</td>
                <td>email@gmail.com</td>
                <td>Lot 282 , 3éme étage , zone ind. Sud-Quest </td>
                <td>Casa</td>
                <td>Actif</td>
                <td><button class="btn btn-warning"><i class="fas fa-edit"></i></button></td>
                <td><button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
            </tr>
        </tbody>
    </table>
    <div>
@endsection


