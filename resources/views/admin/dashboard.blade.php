@extends('layouts.app')

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
                    <th scope="row">{{$u->id}}</th>
                    <td>{{$u->nom}}</td>
                    <td>{{$u->fonction}}</td>
                    <td></td>
                </tr>
        @endforeach
        
        </tbody>
    </table>
    </div>
</div>
@endsection
