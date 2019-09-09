@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    .btn:hover {
    background-color: #87CEEB;
    }
    .button {
        width: 300px;
        height: 45px;
        font-family: 'Roboto', sans-serif;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 2.5px;
        font-weight: 500;
        color: #000;
        background-color: #87CEEB;
        border: none;
        border-radius: 45px;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease 0s;
        cursor: pointer;
        outline: none;
        }

        .button:hover {
        background-color: #2EE59D;
        box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
        color: #fff;
        transform: translateY(-7px);
}
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Nom et Prénom</th>
            <th scope="col">Fonction</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach($users as $u)
            <tbody>
                <tr>
                    <th scope="row">{{$u->nom}}</th>
                    <td>{{$u->email}}</td>
                    <td>{{$u->fonction}}</td>
                    <td>
                        <a href="{{{url('/admin/dashboard/'.$u->email) }}}">
                            <button class="btn" type="submit" onclick="return confirm('Êtes-vous sûr de bien vouloir supprimer cet élément?');">
                                <i class="fa fa-trash"></i>
                            </button>
                        </a>
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
    <div><a href={{url('/admin/add')}}><button class="button btn-default">Ajouter gestionnaire/technicien</button></a></div>
    <div><a href={{url('/admin/global/01')}}><button class="button btn-default">Tableau de bord</button></a></div>
    </div>
</div>
@endsection
