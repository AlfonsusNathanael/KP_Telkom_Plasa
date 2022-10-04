@extends('layout.master')
@section('body')

<main>
    <h1 class="text-center"> Report Penjualan </h1>
    <div class="p-4 my-4 card">
        <ul class="list-inline">
            <li  class="list-inline-item">
                <a class="text-white btn btn-info mb-2" data-bs-toggle="modal" data-bs-target="#ModalFilterInput">Filter Grafik</a>
            </li>

        </ul>
        <h2 class="text-center">Grafik Report Input WMS Consumer</h2>
        <div class="col-md-12" style="background:rgb(255, 255, 255);
            white-space:nowrap;">
            <div style="width: 1000px; ">
                <canvas id="report_input" height="120" ></canvas>
            </div>
        </div>
    </div>

    {{-- <div class="p-4 my-4 card">
        <ul class="list-inline">
            <li  class="list-inline-item">
                <a class="text-white btn btn-info mb-2" data-bs-toggle="modal" data-bs-target="#ModalFilterPS">Filter Grafik</a>
            </li>

        </ul>
        <h2 class="text-center">Grafik Report PS WMS Consumer</h2>
        <div class="col-md-12" style="background:rgb(255, 255, 255);
            white-space:nowrap;">
            <div style="width: 1000px; ">
                <canvas id="report_ps" height="120" ></canvas>
            </div>
        </div>
    </div> --}}

    <div class="p-4 my-4 card">
            <ul class="list-inline">
                <li  class="list-inline-item">
                    <a class="text-white btn btn-info mb-2" data-bs-toggle="modal" data-bs-target="#ModalFilter">Filter Grafik</a>
                </li>
            </ul>
            <h2 class="text-center">Monitoring Order WMS consumer - Witel Sidoarjo</h2>
            <div class="col-md-12" style="background:rgb(255, 255, 255);
                overflow-x: scroll;
                white-space:nowrap;">
                <div style="width: 2500px; ">
                    <canvas id="report_monitoring_order" height="50" ></canvas>
                </div>
            </div>
    </div>

    {{-- <div>
        <canvas id="barchart"></canvas>
      </div> --}}
</main>


<div class="modal fade" id="ModalFilterInput" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <p class="modal-title" id="labelstatus">Filter Data</p>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" enctype="multipart/form-data" id="form_filterChartInput">
                <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}">
                <div class="row">
                    <div class="col-md-12">
                        <label for="filter_date" class="control-label">Filter By Date</label>

                        <div class="row">
                            <div class="col-auto">
                                <input type="date" class="form-control" id="start_date_filter" name="start_date_filter" placeholder="first date">
                            </div>
                            <div class="col-auto d-flex align-items-center">
                                to
                            </div>
                            <div class="col-auto">
                                <input type="date" class="form-control" value="{{date('Y-m-d')}}" id="end_date_filter" name="end_date_filter" placeholder="last date" required>
                            </div>
                        </div>


                    </div>
                </div>
                <br>
                <div >
                      <button class="btn btn-success px-5" id="cariSalin">Cari</button>
                      <button type="button" class="btn btn-secondary px-5" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="ModalFilterPS" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <p class="modal-title" id="labelstatus">Filter Data</p>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" enctype="multipart/form-data" id="form_filterChartPS">
                <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}">
                <div class="row">
                    <div class="col-md-12">
                        <label for="filter_date" class="control-label">Filter By Date</label>

                        <div class="row">
                            <div class="col-auto">
                                <input type="date" class="form-control" id="start_date_filter" name="start_date_filter" placeholder="first date">
                            </div>
                            <div class="col-auto d-flex align-items-center">
                                to
                            </div>
                            <div class="col-auto">
                                <input type="date" class="form-control" value="{{date('Y-m-d')}}" id="end_date_filter" name="end_date_filter" placeholder="last date" required>
                            </div>
                        </div>


                    </div>
                </div>
                <br>
                <div >
                      <button class="btn btn-success px-5" id="cariSalin">Cari</button>
                      <button type="button" class="btn btn-secondary px-5" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

@endsection


@section('custom_script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script>
$(document).ready(function (){

    $.ajax({
        type: "GET",
        url: "{{ url('data/report/input')}}",
        cache: false,

        success: function(hasil2){
            user = hasil2['user'];
            data = hasil2['data'];
            var ctx = document.getElementById("report_input").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [data[0]['user'],data[1]['user'],data[2]['user'],data[3]['user'],data[4]['user'],data[5]['user'],data[6]['user'],data[7]['user']],
                    datasets: [{
                        label: 'Input Data',
                        data: [data[0]['data'],data[1]['data'],data[2]['data'],data[3]['data'],data[4]['data'],data[5]['data'],data[6]['data'],data[7]['data']],
                        backgroundColor: [
                            'rgba(255, 99, 132)','rgba(255, 99, 132)','rgba(255, 99, 132)','rgba(255, 99, 132)','rgba(255, 99, 132)','rgba(255, 99, 132)','rgba(255, 99, 132)','rgba(255, 99, 132)',
                        ],
                        borderWidth: 1
                    },{
                        label: 'Data Completed',
                        data: [data[0]['ps'],data[1]['ps'],data[2]['ps'],data[3]['ps'],data[4]['ps'],data[5]['ps'],data[6]['ps'],data[7]['ps']],
                        backgroundColor: [
                            'rgba(36, 205, 152)','rgba(36, 205, 152)','rgba(36, 205, 152)','rgba(36, 205, 152)','rgba(36, 205, 152)','rgba(36, 205, 152)','rgba(36, 205, 152)','rgba(36, 205, 152)',
                        ],
                        borderWidth: 1
                    }
                ]},
                options: {
                    plugins: {
                        legend: {
                            labels: {
                                font: {
                                    size: 30
                                }
                            }
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });

            $('#form_filterChartInput').submit(function(e){
                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    type:'POST',
                    url: "{{ url('filter/data/input')}}",
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    dataType: 'JSON',
                    success: function (myData) {
                        console.log(myData);
                        data = myData['data'];


                        myChart.destroy();
                        myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: [data[0]['user'],data[1]['user'],data[2]['user'],data[3]['user'],data[4]['user'],data[5]['user'],data[6]['user'],data[7]['user']],
                                datasets: [{
                                    label: 'Input Data',
                                    data: [data[0]['data'],data[1]['data'],data[2]['data'],data[3]['data'],data[4]['data'],data[5]['data'],data[6]['data'],data[7]['data']],
                                    backgroundColor: [
                                        'rgba(255, 99, 132)','rgba(255, 99, 132)','rgba(255, 99, 132)','rgba(255, 99, 132)','rgba(255, 99, 132)','rgba(255, 99, 132)','rgba(255, 99, 132)','rgba(255, 99, 132)','rgba(255, 99, 132)',
                                    ],
                                    borderWidth: 1
                                },{
                                    label: 'Data Completed',
                                    data: [data[0]['ps'],data[1]['ps'],data[2]['ps'],data[3]['ps'],data[4]['ps'],data[5]['ps'],data[6]['ps'],data[7]['ps']],
                                    backgroundColor: [
                                        'rgba(36, 205, 152)','rgba(36, 205, 152)','rgba(36, 205, 152)','rgba(36, 205, 152)','rgba(36, 205, 152)','rgba(36, 205, 152)','rgba(36, 205, 152)','rgba(36, 205, 152)',
                                    ],
                                    borderWidth: 1
                                }
                            ]},
                            options: {
                                plugins: {
                                    legend: {
                                        labels: {
                                            font: {
                                                size: 30
                                            }
                                        }
                                    }
                                },
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero:true
                                        }
                                    }]
                                }
                            }
                        });


                    },
                    error: function(response){
                        console.log(response['responseText']);
                    }
                });
            })
        },
        error: function(response){
            console.log(response);
        }
    });

    // $.ajax({
    //     type: "GET",
    //     url: "{{ url('data/report/ps')}}",
    //     cache: false,

    //     success: function(hasil2){

    //         user = hasil2['user'];
    //         data = hasil2['data'];
    //         var ctx = document.getElementById("report_ps").getContext('2d');
    //         var myChart = new Chart(ctx, {
    //             type: 'bar',
    //             data: {
    //                 labels: [data[0]['user'],data[1]['user'],data[2]['user'],data[3]['user'],data[4]['user'],data[5]['user'],data[6]['user'],data[7]['user']],
    //                 datasets: [{
    //                     label: 'Data Completed',
    //                     data: [data[0]['data'],data[1]['data'],data[2]['data'],data[3]['data'],data[4]['data'],data[5]['data'],data[6]['data'],data[7]['data']],
    //                     backgroundColor: [
    //                         'rgba(36, 205, 152)','rgba(36, 205, 152)','rgba(36, 205, 152)','rgba(36, 205, 152)','rgba(36, 205, 152)','rgba(36, 205, 152)','rgba(36, 205, 152)','rgba(36, 205, 152)',
    //                     ],
    //                     borderWidth: 1
    //                 }
    //             ]},
    //             options: {
    //                 plugins: {
    //                     legend: {
    //                         labels: {
    //                             font: {
    //                                 size: 30
    //                             }
    //                         }
    //                     }
    //                 },
    //                 scales: {
    //                     yAxes: [{
    //                         ticks: {
    //                             beginAtZero:true
    //                         }
    //                     }]
    //                 }
    //             }
    //         });

    //         $('#form_filterChartPS').submit(function(e){
    //             e.preventDefault();
    //             var formData = new FormData(this);

    //             $.ajax({
    //                 type:'POST',
    //                 url: "{{ url('filter/data/ps')}}",
    //                 data: formData,
    //                 cache:false,
    //                 contentType: false,
    //                 processData: false,
    //                 dataType: 'JSON',
    //                 success: function (myData) {
    //                     console.log(myData);
    //                     data = myData['data'];

    //                     myChart.destroy();
    //                     myChart = new Chart(ctx, {
    //                         type: 'bar',
    //                         data: {
    //                             labels: [data[0]['user'],data[1]['user'],data[2]['user'],data[3]['user'],data[4]['user'],data[5]['user'],data[6]['user'],data[7]['user'],data[8]['user'],data[9]['user'],data[10]['user'],data[11]['user']],
    //                             datasets: [{
    //                                 label: 'Input Data',
    //                                 data: [data[0]['data'],data[1]['data'],data[2]['data'],data[3]['data'],data[4]['data'],data[5]['data'],data[6]['data'],data[7]['data'],data[8]['data'],data[9]['data'],data[10]['data'],data[11]['data']],
    //                                 backgroundColor: [
    //                                     'rgba(255, 99, 132)','rgba(255, 99, 132)','rgba(255, 99, 132)','rgba(255, 99, 132)','rgba(255, 99, 132)','rgba(255, 99, 132)','rgba(255, 99, 132)','rgba(255, 99, 132)','rgba(255, 99, 132)','rgba(255, 99, 132)','rgba(255, 99, 132)','rgba(255, 99, 132)',
    //                                 ],
    //                                 borderWidth: 1
    //                             }
    //                         ]},
    //                         options: {
    //                             plugins: {
    //                                 legend: {
    //                                     labels: {
    //                                         font: {
    //                                             size: 30
    //                                         }
    //                                     }
    //                                 }
    //                             },
    //                             scales: {
    //                                 yAxes: [{
    //                                     ticks: {
    //                                         beginAtZero:true
    //                                     }
    //                                 }]
    //                             }
    //                         }
    //                     });


    //                 },
    //                 error: function(response){
    //                     console.log(response['responseText']);
    //                 }
    //             });
    //         })
    //     },
    //     error: function(response){
    //         console.log(response);
    //     }
    // });

    $.ajax({
        type: "GET",
        url: "{{ url('data/report/monitor')}}",
        cache: false,

        success: function(hasil2){
            console.log(hasil2['data']);
                    
            data = hasil2['data'];
            var ctx = document.getElementById("report_monitoring_order").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [data[0]['datel'],data[1]['datel'],data[2]['datel'],data[3]['datel']],
                    datasets: [{
                        label: 'Total WO',
                        data: [data[0]['total wo'],data[1]['total wo'],data[2]['total wo'],data[3]['total wo']],
                        backgroundColor: [
                            'rgba(255, 206, 86)','rgba(255, 206, 86)','rgba(255, 206, 86)','rgba(255, 206, 86)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'On Progess',
                        data: [data[0]['on progess'],data[1]['on progess'],data[2]['on progess'],data[3]['on progess']],
                        backgroundColor: [
                            'rgba(255, 206, 86)','rgba(255, 206, 86)','rgba(255, 206, 86)','rgba(255, 206, 86)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Alpro Ready',
                        data: [data[0]['alpro ready'],data[1]['alpro ready'],data[2]['alpro ready'],data[3]['alpro ready']],
                        backgroundColor: [
                            'rgba(255, 206, 86)','rgba(255, 206, 86)','rgba(255, 206, 86)','rgba(255, 206, 86)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Propose Construction',
                        data: [data[0]['propose construction'],data[1]['propose construction'],data[2]['propose construction'],data[3]['propose construction']],
                        backgroundColor: [
                            'rgba(255, 99, 132)','rgba(255, 99, 132)','rgba(255, 99, 132)','rgba(255, 99, 132)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Propose Maintenance',
                        data: [data[0]['propose maintenance'],data[1]['propose maintenance'],data[2]['propose maintenance'],data[3]['propose maintenance']],
                        backgroundColor: [
                            'rgba(255, 99, 132)','rgba(255, 99, 132)','rgba(255, 99, 132)','rgba(255, 99, 132)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Kendala NTE',
                        data: [data[0]['kendala nte'],data[1]['kendala nte'],data[2]['kendala nte'],data[3]['kendala nte']],
                        backgroundColor: [
                            'rgba(255, 99, 132)','rgba(255, 99, 132)','rgba(255, 99, 132)','rgba(255, 99, 132)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Kendala Alpro',
                        data: [data[0]['kendala alpro'],data[1]['kendala alpro'],data[2]['kendala alpro'],data[3]['kendala alpro']],
                        backgroundColor: [
                            'rgba(255, 99, 132)','rgba(255, 99, 132)','rgba(255, 99, 132)','rgba(255, 99, 132)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Anomali Order',
                        data: [data[0]['anomali order'],data[1]['anomali order'],data[2]['anomali order'],data[3]['anomali order']],
                        backgroundColor: [
                            'rgba(54, 162, 235)','rgba(54, 162, 235)','rgba(54, 162, 235)','rgba(54, 162, 235)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Cancel By Customer',
                        data: [data[0]['cancelByCuztomer'],data[1]['cancelByCuztomer'],data[2]['cancelByCuztomer'],data[3]['cancelByCuztomer']],
                        backgroundColor: [
                            'rgba(54, 162, 235)','rgba(54, 162, 235)','rgba(54, 162, 235)','rgba(54, 162, 235)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Customer Handicap',
                        data: [data[0]['CuztomerHandicap'],data[1]['CuztomerHandicap'],data[2]['CuztomerHandicap'],data[3]['CuztomerHandicap']],
                        backgroundColor: [
                            'rgba(54, 162, 235)','rgba(54, 162, 235)','rgba(54, 162, 235)','rgba(54, 162, 235)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'LME OK - ONT OK',
                        data: [data[0]['LmeokOntok'],data[1]['LmeokOntok'],data[2]['LmeokOntok'],data[3]['LmeokOntok']],
                        backgroundColor: [
                            'rgba(75, 192, 192)','rgba(75, 192, 192)','rgba(75, 192, 192)','rgba(75, 192, 192)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'LME OK - ONT OK - AP OK',
                        data: [data[0]['LmeokOntokApok'],data[1]['LmeokOntokApok'],data[2]['LmeokOntokApok'],data[3]['LmeokOntokApok']],
                        backgroundColor: [
                            'rgba(75, 192, 192)','rgba(75, 192, 192)','rgba(75, 192, 192)','rgba(75, 192, 192)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Total Clear',
                        data: [data[0]['TotalClear'],data[1]['TotalClear'],data[2]['TotalClear'],data[3]['TotalClear']],
                        backgroundColor: [
                            'rgba(75, 192, 192)','rgba(75, 192, 192)','rgba(75, 192, 192)','rgba(75, 192, 192)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Belum Input SC',
                        data: [data[0]['KetBelumInputSC'],data[1]['KetBelumInputSC'],data[2]['KetBelumInputSC'],data[3]['KetBelumInputSC']],
                        backgroundColor: [
                            'rgba(169,169,169)','rgba(169,169,169)','rgba(169,169,169)','rgba(169,169,169)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'FCC',
                        data: [data[0]['KetFCC'],data[1]['KetFCC'],data[2]['KetFCC'],data[3]['KetFCC']],
                        backgroundColor: [
                            'rgba(169,169,169)','rgba(169,169,169)','rgba(169,169,169)','rgba(169,169,169)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'ONT tidak Detect',
                        data: [data[0]['KetOntTidakDetect'],data[1]['KetOntTidakDetect'],data[2]['KetOntTidakDetect'],data[3]['KetOntTidakDetect']],
                        backgroundColor: [
                            'rgba(147,112,219)','rgba(147,112,219)','rgba(147,112,219)','rgba(147,112,219)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'AP tidak Detect',
                        data: [data[0]['KetApTidakDetect'],data[1]['KetApTidakDetect'],data[2]['KetApTidakDetect'],data[3]['KetApTidakDetect']],
                        backgroundColor: [
                            'rgba(147,112,219)','rgba(147,112,219)','rgba(147,112,219)','rgba(147,112,219)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'OGP',
                        data: [data[0]['KetOgpPS'],data[1]['KetOgpPS'],data[2]['KetOgpPS'],data[3]['KetOgpPS']],
                        backgroundColor: [
                            'rgba(255,228,181)','rgba(255,228,181)','rgba(255,228,181)','rgba(255,228,181)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Completed',
                        data: [data[0]['KetCompleted'],data[1]['KetCompleted'],data[2]['KetCompleted'],data[3]['KetCompleted']],
                        backgroundColor: [
                            'rgba(255,228,181)','rgba(255,228,181)','rgba(255,228,181)','rgba(255,228,181)',
                        ],
                        borderWidth: 1
                    }
                ]},
                options: {
                    plugins: {
                        legend: {
                            labels: {
                                font: {
                                    size: 14
                                }
                            }
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        },
        error: function(response){
            console.log(response);
        }
    });
});
</script>
@endsection
