@extends('layouts.app')

@section('content')
@guest
<div class="bg-light p-5 text-center">
    <h1>💖💖💖💖💖💖Dashboard💖💖💖💖💖💖</h1>
    <p class="lead">Hãy đăng nhập để vào hệ thống</p>
</div>
@endguest

@auth
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-3 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <i class="bx bx-hotel rounded  btn-outline-success p-2 border border-success"></i>
                        </div>
                        <a href="{{ route('phongs.index') }}">Detail</a>
                    </div>
                    <span class="fw-semibold d-block mb-1">Phòng</span>
                    <h3 class="card-title mb-2">{{ $sophong }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <i class="bx bx-user rounded  btn-outline-info p-2 border border-info"></i>
                        </div>
                        <a href="{{ route('khachhangs.index') }}">Detail</a>
                    </div>
                    <span class="fw-semibold d-block mb-1">Khách hàng</span>
                    <h3 class="card-title mb-2">{{ $sokhachhang }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <i class="bx bx-group rounded  btn-outline-danger p-2 border border-danger"></i>
                        </div>
                        <a href="{{ route('nhanviens.index') }}">Detail</a>
                    </div>
                    <span class="fw-semibold d-block mb-1">Nhân viên</span>
                    <h3 class="card-title mb-2">{{ $sonhanvien }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <i class="bx bx-user-circle rounded  btn-outline-primary p-2 border border-primary"></i>
                        </div>
                        <a href="{{ route('users.index') }}">Detail</a>
                    </div>
                    <span class="fw-semibold d-block mb-1">Account</span>
                    <h3 class="card-title mb-2">{{ $souser }}</h3>
                </div>
            </div>
        </div>
    </div>
    {{ Html::script('https://code.jquery.com/jquery-3.1.1.min.js') }}
    {{ Html::script('https://code.highcharts.com/highcharts.js') }}
    {{ Html::script('https://code.highcharts.com/modules/exporting.js') }}
    {{ Html::script('https://code.highcharts.com/modules/export-data.js') }}
    <div class="d-flex">
        <div class="card m-1">
            <div id="container2" data-order="{{ $thanhtoan }}"></div>
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
        </div>
        <div class="card m-1">
            <div id="container" data-order="{{ $thanhtoan }}"></div>
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
        </div>  
    </div>
    <div class="card m-1">
        <div id="container3" data-order="{{ $nhanphong }}"></div>
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
</div>

@endauth
@endsection