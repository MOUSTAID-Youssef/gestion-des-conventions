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
                <th>Login</th>
                <th>Privilège</th>
                <th>Ville</th>
                <th>Etat</th>
                <th>Consulter</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>abdelali</td>
                <td>ghardgui</td>
                <td>rdfradeema</td>
                <td>admin</td>
                <td>Marrakech</td>
                <td>actif</td>
                <td><button class="btn btn-info"><i class="fas fa-eye"></i></button></td>
                <td><button class="btn btn-warning"><i class="fas fa-edit"></i></button></td>
                <td><button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
            </tr>
            <tr>
                <td>ACHBAROU</td>
                <td>MOUHCINE</td>
                <td>ACHBAROU</td>
                <td>user</td>
                <td>Taza</td>
                <td>actif</td>
                <td><button class="btn btn-info"><i class="fas fa-eye"></i></button></td>
                <td><button class="btn btn-warning"><i class="fas fa-edit"></i></button></td>
                <td><button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
            </tr>
            <tr>
                <td>BENANI</td>
                <td>ADIL</td>
                <td>RADEEF2016</td>
                <td>user</td>
                <td>Fès</td>
                <td>actif</td>
                <td><button class="btn btn-info"><i class="fas fa-eye"></i></button></td>
                <td><button class="btn btn-warning"><i class="fas fa-edit"></i></button></td>
                <td><button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
            </tr>
            <tr>
                <td>bensediq</td>
                <td>farid</td>
                <td>bensediq</td>
                <td>admin</td>
                <td>Oujda</td>
                <td>actif</td>
                <td><button class="btn btn-info"><i class="fas fa-eye"></i></button></td>
                <td><button class="btn btn-warning"><i class="fas fa-edit"></i></button></td>
                <td><button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
            </tr>
        </tbody>
    </table>
    <div>
@endsection


