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

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
<script>

    var data_operation = <?php echo $count; ?>;


    var barChartData = {
        labels: ['Mois sélectionné'],
        datasets: [ {
            label: 'Opérations',
            backgroundColor: "rgba(151,187,205,0.5)",
            data: [data_operation]
        }]
    };
window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: 'rgb(0, 255, 0)',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Les operations du mois sélectionné'
                }
            }
        });


    };
</script>
@extends('layouts.app')
@section('content')



<div class="row">
    <div class="col-md-4">
        <div class="list-group">
        @foreach ($mois as $m=>$month)
            <a class="list-group-item {{$m === $month_selected ? 'active' : ''}}" href="/admin/global/{{$m}}">{{$month}}</a>
        @endforeach
        </div>
    </div>

    <div class="col-md-4">
    <div class="card">
        <div class="card-body">
            <strong style="font-size:1em">
                Etat De Vehicules:
            </strong>
            <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Immatriculation</th>
            <th scope="col">Etat</th>
            </tr>
        </thead>
        @foreach($vehicules as $v)
            <tbody>
                <tr>
                    <td>{{$v->immatriculation}}</td>
                    <td>{{$v->etat}}</td>
                    
                </tr>
        @endforeach
        </tbody>
    </table>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <strong style="font-size:1em">
                Operations En Cours:
            </strong>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Immatriculation</th>
                    <th scope="col">Etat</th>
                    </tr>
                </thead>
                @foreach($encours as $e)
                    <tbody>
                        <tr>
                            <td>{{$e->sujet}}</td>
                            <td>{{$e->description}}</td>
                        </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    </div>
    
    <div class="col-md-4">
    <div class="card">
        <div class="card-body">
            <strong style="font-size:1em">
                Operations En Avenir:
            </strong>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Immatriculation</th>
                    <th scope="col">Etat</th>
                    </tr>
                </thead>
                @foreach($avenir as $a)
                    <tbody>
                        <tr>
                            <td>{{$a->sujet}}</td>
                            <td>{{$a->description}}</td>
                        </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <canvas id="canvas" height="200" width="600"></canvas>
        </div>
    </div>
    </div>
    
</div>
@endsection