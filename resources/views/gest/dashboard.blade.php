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
        <thead class="thead-dark">
            <tr>
            <th scope="col">Marque</th>
            <th scope="col">Immatriculation</th>
            <th scope="col">Chevaux</th>
            <th scope="col">Type</th>
            <th scope="col">Modele</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach($vehicules as $v)
            <tbody>
                <tr>
                    <th scope="row">{{$v->marque}}</th>
                    <td>{{$v->immatriculation}}</td>
                    <td>{{$v->chevaux}}</td>
                    <td>{{$v->type}}</td>
                    <td>{{$v->modele}}</td>
                    <td>
                        <a href="{{{url('/gest/dashboard/'.$v->immatriculation) }}}">
                            <button class="btn" type="submit" onclick="return confirm('Êtes-vous sûr de bien vouloir supprimer cet élément?');">
                                <i class="fa fa-trash"></i>
                            </button>
                        </a>
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
    <div><a href={{url('/gest/add')}}><button class="button btn-default">Ajouter un véhicule</button></a></div>
    </div>
</div>
@endsection
