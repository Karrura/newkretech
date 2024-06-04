@extends('template.nav')
@section('title', 'Kretech - Report')
@section('isi')
<style>
    @import url("https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;700");
    @import url("https://api.fontshare.com/css?f[]=quicksand@400,500,700&display=swap");
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 360px;
        max-width: 85%;
        margin: 1em auto;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }

    .accordion {
        --bs-border-color: rgba(32, 151, 145, 1);
        --bs-border-width: 2px;
    }
</style>
<div class="container">
    <div class="container-fluid">
        <div class="row p-2">
            <div class="col-12 mt-3">
                <a href="{{url('predict')}}">
                    <ion-icon name="arrow-back-outline" style="color: rgba(32, 151, 145, 1); font-size: 35px"></ion-icon>
                </a>
                <figure class="highcharts-figure">
                    <div id="container"></div>
                    <p class="highcharts-description">
                      
                    </p>
                </figure>
            </div>
        </div>
        <div class="row P-2">
            <div class="accordion" id="accordionExample">
                @foreach(array_reverse($res->data) as $index => $d)
                    <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accor{{$index}}" aria-expanded="true" aria-controls="accor{{$index}}">
                            <div class="col" style="color: rgba(32, 151, 145, 1); font-family: Quicksand;">
                                <strong>{{$index+1}}. Riwayat Prediksi {{session()->get('username')}} / {{date('d-m-Y H:i', strtotime($d->createdAt))}}</strong>
                            </div>
                            <div class="col">
                                <span class="badge {{$d->predictionMessage == 'You have Diabetes, please consult a Doctor.'? "text-bg-danger": "";}}" style="background-color: rgba(32, 151, 145, 1);">{{$d->predictionMessage}}</span>
                            </div>
                        </button>
                    </h2>
                    <div id="accor{{$index}}" class="accordion-collapse collapse">
                        <div class="accordion-body">
                        <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                    </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        var predict = <?php echo json_encode($score) ?>;
        Highcharts.chart('container', {
            title: {
                text: '<span style="font-family: Quicksand; color: rgba(32, 151, 145, 1); font-size: 30px"><strong>Riwayat Prediksi</strong></span>',
                align: 'center'
            },
            colors: ["#209791", "#2caffe", "#544fc5", "#00e272", "#fe6a35", "#6b8abc", "#d568fb", "#2ee0ca", "#fa4b42", "#feb56a", "#91e8e1"],
            subtitle: {
                text: '<span style="font-family: Quicksand; color: rgba(32, 151, 145, 1);"><strong>By KRETECH</strong></span>',
                align: 'center'
            },
            yAxis: {
                title: {
                    text: '<span style="font-family: Quicksand; color: rgba(32, 151, 145, 1); font-size: 15px">Prediction Score</span>'
                },
                max: 1,
                min: 0
            },
            xAxis: {
                title: {
                    text: '<span style="font-family: Quicksand; color: rgba(32, 151, 145, 1); font-size: 15px">Prediction Time</span>'
                },
                min: 1
            },
            legend: {
                layout: 'horizontal',
                align: 'right',
                horizontalAlign: 'middle'
            },
            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                        },
                    pointStart: 1
                }
            },
            series: [{
                    name: 'Prediction Score',
                    data: predict
                }
            ],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'vertical',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
    });
</script>
@endsection