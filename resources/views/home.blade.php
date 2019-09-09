@extends('layouts.app')
@section('content')

<?php
    $mois = [
        '01' => 'Janvier',
        '02' => 'Février',
        '03' => 'Mars',
        '04' => 'Avril',
        '05' => 'Mai',
        '06' => 'Juin',
        '07' => 'Juillet',
        '08' => 'Aout',
        '09' => 'September',
        '10' => 'October',
        '11' => 'November',
        '12' => 'December',
    ];
    $month_selected = empty($_GET['month']) ? date('m') : $_GET['mois'];
?>

<div class="row">
    <div class="col-md-4">
        <div class="list-group">
        @foreach ($mois as $m=>$month)
            <a class="list-group-item {{$m === $month_selected ? 'active' : ''}}" href="/test/{{$m}}">{{$month}}</a>
        @endforeach
        </div>
    </div>

    <div class="col-md-8">
    <div class="card">
        <div class="card-body">
            <strong style="font-size:3em">
                {{$count}}
            </strong>
        </div>
    </div>
    </div>
</div>
@endsection