@extends('layouts3.app')

@section('content')
    @guest
        <div class="bg-light p-5 text-center">
            <h1>💖💖💖💖💖💖Dashboard💖💖💖💖💖💖</h1>
            <p class="lead">Hãy đăng nhập để vào hệ thống</p>
        </div>
    @endguest

    @auth

        <div class="d-flex justify-content-end gap-1">
            <div class="flex-grow-1">
                @include('layouts3.title', ['titlePage' => 'Hotel Overview'])
            </div>
            <div class="d-flex gap-1">
                @include('layouts2.checkIncheckOut')
            </div>
        </div>

        <div>

            @include('layouts3.overview')

            {{ Html::script('https://code.jquery.com/jquery-3.1.1.min.js') }}
            {{ Html::script('https://code.highcharts.com/highcharts.js') }}
            {{ Html::script('https://code.highcharts.com/modules/exporting.js') }}
            {{ Html::script('https://code.highcharts.com/modules/export-data.js') }}
            <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white pt-7 border-y border-300">
                <div class="row">
                    <div class="col-6">
                        <div class="col-12">
                            <div id="container2" data-order="{{ $thanhtoan }}"></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="col-12">
                            <div id="container" data-order="{{ $thanhtoan }}"></div>
                        </div>
                    </div>
                    <div class="col-12 my-4">
                        <div class="col-12">
                            <div id="container3" data-order="{{ $nhanphong }}"></div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $(document).ready(function() {
                    var order = $('#container2').data('order');
                    var listOfValue = [];
                    var listOfYear = [];
                    order.forEach(function(element) {
                        listOfYear.push(element.chuathanhtoan);
                        listOfYear.push(element.dathanhtoan);
                        listOfValue.push(element.sochuathanhtoan);
                        listOfValue.push(element.sodathanhtoan);
                    });
                    console.log(listOfValue);
                    var chart = Highcharts.chart('container2', {

                        title: {
                            text: 'Thanh toán'
                        },

                        subtitle: {
                            text: 'Tình trạng thanh toán'
                        },

                        xAxis: {
                            categories: listOfYear,
                        },

                        series: [{
                            type: 'column',
                            colorByPoint: true,
                            data: listOfValue,
                            showInLegend: false
                        }]
                    });

                    $('#plain').click(function() {
                        chart.update({
                            chart: {
                                inverted: false,
                                polar: false
                            },
                            subtitle: {
                                text: 'Plain'
                            }
                        });
                    });

                    $('#inverted').click(function() {
                        chart.update({
                            chart: {
                                inverted: true,
                                polar: false
                            },
                            subtitle: {
                                text: 'Inverted'
                            }
                        });
                    });

                    $('#polar').click(function() {
                        chart.update({
                            chart: {
                                inverted: false,
                                polar: true
                            },
                            subtitle: {
                                text: 'Polar'
                            }
                        });
                    });
                });
            </script>
            <script>
                $(document).ready(function() {
                    var productBuy = $('#container').data('order');
                    var chartData = [];
                    productBuy.forEach(function(element) {
                        var ele = {
                            name: element.chuathanhtoan,
                            y: parseFloat(element.sochuathanhtoan)
                        };
                        chartData.push(ele);
                        var ele2 = {
                            name: element.dathanhtoan,
                            y: parseFloat(element.sodathanhtoan)
                        };
                        chartData.push(ele2);
                    });
                    console.log(chartData);
                    Highcharts.chart('container', {
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'pie'
                        },
                        title: {
                            text: 'Thanh toán'
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: false
                                },
                                showInLegend: true
                            }
                        },
                        series: [{
                            name: 'Brands',
                            colorByPoint: true,
                            data: chartData,
                        }],
                    });
                });
            </script>
            <script>
                $(document).ready(function() {
                    var order = $('#container3').data('order');
                    var listOfValue = [];
                    var listOfYear = [];
                    order.forEach(function(element) {
                        listOfYear.push(element.chuanhanphong);
                        listOfYear.push(element.danhanphong);
                        listOfValue.push(element.sochuanhanphong);
                        listOfValue.push(element.sodanhanphong);
                    });
                    console.log(listOfValue);
                    var chart = Highcharts.chart('container3', {

                        title: {
                            text: 'Nhận phòng'
                        },

                        subtitle: {
                            text: 'Tình trạng nhận phòng'
                        },

                        xAxis: {
                            categories: listOfYear,
                        },

                        series: [{
                            type: 'column',
                            colorByPoint: true,
                            data: listOfValue,
                            showInLegend: false
                        }]
                    });

                    $('#plain').click(function() {
                        chart.update({
                            chart: {
                                inverted: false,
                                polar: false
                            },
                            subtitle: {
                                text: 'Plain'
                            }
                        });
                    });

                    $('#inverted').click(function() {
                        chart.update({
                            chart: {
                                inverted: true,
                                polar: false
                            },
                            subtitle: {
                                text: 'Inverted'
                            }
                        });
                    });

                    $('#polar').click(function() {
                        chart.update({
                            chart: {
                                inverted: false,
                                polar: true
                            },
                            subtitle: {
                                text: 'Polar'
                            }
                        });
                    });
                });
            </script>

        </div>

    @endauth
@endsection
