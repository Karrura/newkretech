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
                
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Fillter End Date and Start Date</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{url('report')}}" method="get" enctype="multipart/form-data">
                                @csrf
                                @method('GET')
                                <div class="row">
                                    <div class="col form-group text-left">
                                        <label class="control-label" style="margin-bottom: 7px">From</label>
                                        <input type="date" class="form-control form-control-lg input-secondary shadow-sm" name="startdate" required>
                                    </div>
                                    <div class="col form-group text-left">
                                        <label class="control-label" style="margin-bottom: 7px">To</label>
                                        <input type="date" class="form-control form-control-lg input-secondary shadow-sm" name="enddate" required>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="submit" class="btn" style="background-color: rgba(32, 151, 145, 1); color: white;"><strong>Search</strong></button>
                                </div>
                            </form>
                        </div>
                      </div>
                    </div>
                </div>                                  
                <figure class="highcharts-figure">
                    <div id="container"></div>
                    <p class="highcharts-description">
                      
                    </p>
                </figure>
            </div>
            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: rgba(32, 151, 145, 1); color: white;">Fillter</button>
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
                            <div class="row">
                                <div class="col">
                                    <h3 style="color: rgba(32, 151, 145, 1); font-family: Quicksand;"><strong>Riwayat Prediksi</strong></h3>
                                    <span style="color: rgba(32, 151, 145, 1); font-family: Quicksand;"><strong>{{session()->get('fullName')}}</strong></span>
                                    {{-- KOTAK HISTORY INFO --}}
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        <div class="row">
                                            <span><strong>Data</strong></span>
                                        </div>
                                        <div class="row">
                                            <div class="col-2"><label class="text-dark">Age</label></div>
                                            <div class="col-2">{{$d->age}}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2"><label class="text-dark">Weigth</label></div>
                                            <div class="col-2">{{$d->weight}}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2"><label class="text-dark">Height</label></div>
                                            <div class="col-2">{{$d->height}}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2"><label class="text-dark">Insulin</label></div>
                                            <div class="col-2">{{$d->insulin}}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2"><label class="text-dark">Glucose</label></div>
                                            <div class="col-2">{{$d->glucose}}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2"><label class="text-dark">BMI</label></div>
                                            <div class="col-2">{{$d->bmi}}</div>
                                        </div>
                                        <div class="row">
                                            <strong>Prediction Score: {{$d->predictionNumber}}</strong>
                                        </div>
                                        <div class="row">
                                            <strong>Result: {{$d->predictionMessage}}</strong>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                                <div class="col">
                                    <h3 style="color: rgba(32, 151, 145, 1); font-family: Quicksand;"><strong>Saran</strong></h3>
                                    <br>
                                    {{-- KOTAK SARAN --}}
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        <div class="row">
                                            <span><strong>Berdasarkan input kadar gula darah puasa: </strong>
                                                @php
                                                    if($d->glucose < 70){
                                                        echo 'Gejala akut seperti pusing, lemas, keringat dingin, kebingungan, dan bisa menyebabkan kejang atau kehilangan kesadaran jika sangat rendah. Konsumsi makanan atau minuman yang mengandung gula segera jika gejala muncul. Monitor kadar gula darah secara teratur, terutama bagi penderita diabetes yang menggunakan insulin atau obat lain.';
                                                    }else if($d->glucose < 100){
                                                        echo 'Pertahankan pola makan seimbang yang kaya serat, buah-buahan, sayuran, dan protein tanpa lemak.Lakukan olahraga secara teratur.Pertahankan berat badan ideal.Hindari stres berlebihan.';
                                                    }else if($d->glucose < 126){
                                                        echo 'Adopsi pola makan sehat yang rendah karbohidrat sederhana dan gula. Tingkatkan aktivitas fisik. Monitor kadar gula darah secara teratur. Pertahankan berat badan yang sehat.';
                                                    }else{
                                                        echo 'Risiko komplikasi jangka panjang seperti penyakit jantung, kerusakan ginjal, kerusakan saraf, dan masalah penglihatan. Ketoasidosis diabetik pada diabetes tipe 1. Ikuti perawatan medis yang diresepkan, termasuk penggunaan obat atau insulin. Monitor kadar gula darah secara teratur.Adopsi pola makan yang direkomendasikan oleh ahli gizi.Lakukan olahraga secara teratur.Pertahankan berat badan yang sehat.';
                                                    }
                                                @endphp
                                            </span>
                                        </div>
                                        <div class="row">
                                            <span><strong>Berdasarkan tingkat BMI: </strong>
                                                @php
                                                if($d->bmi < 19){
                                                    echo 'Risiko kekurangan gizi. Osteoporosis. Sistem kekebalan tubuh yang lemah. Anemia. Konsumsi makanan yang kaya nutrisi dan kalori. Sertakan protein, karbohidrat kompleks, dan lemak sehat dalam diet. Konsultasikan dengan ahli gizi untuk rencana makan yang tepat. Lakukan latihan kekuatan untuk membangun massa otot.';
                                                }else if($d->bmi < 25){
                                                    echo 'Pertahankan pola makan seimbang yang kaya serat, buah-buahan, sayuran, dan protein tanpa lemak. Lakukan olahraga secara teratur. Monitor berat badan secara berkala. Hindari kebiasaan tidak sehat seperti merokok dan konsumsi alkohol berlebihan.';
                                                }else if($d->bmi < 30){
                                                    echo 'Peningkatan risiko penyakit jantung, tekanan darah tinggi, diabetes tipe 2, dan beberapa jenis kanker. Adopsi pola makan sehat yang rendah karbohidrat sederhana dan lemak jenuh. Tingkatkan aktivitas fisik, seperti berolahraga minimal 150 menit per minggu. Monitor berat badan secara berkala.Pertahankan gaya hidup aktif dan hindari duduk terlalu lama.';
                                                }else{
                                                    echo 'Risiko tinggi penyakit jantung, diabetes tipe 2, tekanan darah tinggi, penyakit hati, dan masalah sendi. Konsultasikan dengan dokter atau ahli gizi untuk rencana penurunan berat badan yang aman. Ikuti program penurunan berat badan yang mencakup diet seimbang dan aktivitas fisik teratur. Monitor berat badan dan kesehatan secara rutin.Pertimbangkan intervensi medis jika diperlukan.';
                                                }
                                                @endphp
                                            </span>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            </div>
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
        var periode = <?php echo json_encode($periode) ?>;
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
                categories: periode,
                title: {
                    text: '<span style="font-family: Quicksand; color: rgba(32, 151, 145, 1); font-size: 15px">Prediction Time</span>'
                }
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