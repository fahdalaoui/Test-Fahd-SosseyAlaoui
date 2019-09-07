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
    <table class="table table-hover">
        <thead class="thead">
            <tr>
            <th>Date debut</th>
            <th scope="col">Date de fin</th>
            <th scope="col">Sujet</th>
            <th scope="col">Description</th>
            <th scope="col">Pieces</th>
            <th scope="col">Notes</th>
            <th scope="col">Images des pieces</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach($operations as $o)
            <tbody>
                <tr>
                    <th scope="row">{{$o->dateDebut}}</th>
                    <td>{{$o->dateFin}}</td>
                    <td>{{$o->sujet}}</td>
                    <td>{{$o->description}}</td>
                    <td>{{$o->pieces}}</td>
                    <td>{{$o->notes}}</td>
                    
                    <td><img src="/storage/{{$o->image}}" style="width:80px"></td>
                    <td>
                        <a href="{{{url('/tech/update/'.$o->id) }}}">
                            <button class="btn" type="submit">
                                <i class="fa fa-plus-square"></i>
                            </button>
                        </a>
                        <a href="{{{url('/tech/dashboard/'.$o->id) }}}">
                            <button class="btn" type="submit">
                                <i class="fa fa-check"></i>
                            </button>
                        </a>
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection
