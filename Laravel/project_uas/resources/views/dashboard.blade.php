@extends('layout.master')
@section('title', 'Halaman Dashboard')
<main id="main" class="main">
    @section('content')
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Dashboard</h4>
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between traffic-status">
                                <span class="border border-primary">
                                    <div class="item">
                                        <p class="mb-2">Jumlah Pesanan</p>
                                        <h5 class="font-weight-bold mb-0">{{ $pesanan }}</h5>
                                        <div class="color-border"></div>
                                    </div>
                                </span>
                                <span class="border border-primary">
                                    <div class="item">
                                        <p class="mb-2">Jumlah Menu</p>
                                        <h5 class="font-weight-bold mb-0">{{ $menu }}</h5>
                                        <div class="color-border"></div>
                                    </div>
                                </span>
                            </div>
                        </div>

                        {{-- JavaScript --}}
                        <script src="https://code.highcharts.com/highcharts.js"></script>
                        <script src="https://code.highcharts.com/modules/exporting.js"></script>
                        <script src="https://code.highcharts.com/modules/export-data.js"></script>
                        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
                        <figure class="highcharts-figure">
                            <div id="container" class="mt-5"></div>

                        </figure>

                        {{-- Inline JavaScript --}}
                        <script>
                            Highcharts.chart('container', {
                                chart: {
                                    type: 'column'
                                },
                                title: {
                                    text: 'Jumlah Menu Terjual'
                                },
                                subtitle: {
                                    text: 'Source: localhost'
                                },
                                xAxis: {
                                    categories: [
                                        @foreach ($rekomen_menu as $data)
                                            '{{ $data->nama_menu }}',
                                        @endforeach
                                    ],
                                    crosshair: true
                                },
                                yAxis: {
                                    min: 0,
                                    title: {
                                        text: 'Jumlah Menu Terjual'
                                    }
                                },
                                tooltip: {
                                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                    pointFormat: '<tr><td style="color:{series.color};padding:0"></td>' +
                                        '<td style="padding:0"><b>{point.y:.0f}</b></td></tr>',
                                    footerFormat: '</table>',
                                    shared: true,
                                    useHTML: true
                                },
                                plotOptions: {
                                    column: {
                                        pointPadding: 0.2,
                                        borderWidth: 0
                                    }
                                },
                                series: [{
                                    name: 'Menu',
                                    data: [
                                        @foreach ($rekomen_menu as $data)
                                            {{ $data->menu_terjual }},
                                        @endforeach
                                    ]
                                }]
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    @endsection
