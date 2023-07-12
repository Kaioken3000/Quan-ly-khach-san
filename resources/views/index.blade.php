@extends('layouts2.app')

@section('content')
@guest
<div class="bg-light p-5 text-center">
    <h1>💖💖💖💖💖💖Dashboard💖💖💖💖💖💖</h1>
    <p class="lead">Hãy đăng nhập để vào hệ thống</p>
</div>
@endguest

@auth

<div class="d-flex justify-content-end">
    <?php 
        $today = date("Y-m-d");
        $checkin = App\Models\Check::where("nhanvienid", Auth::user()->id)->latest()->first();
        ?>
    @if($checkin)
        @if($today > $checkin->ngaycheckin)
        <form action="/checkin" method="post" class="mr-1">
            @csrf
            @method('POST')
            <input type="hidden" value="{{Auth::user()->id}}" name="nhanvienid">
            <button type="submit" class="btn btn-primary">Checkin</button>
        </form>
        @endif
        @if($checkin->ngaycheckout == null)
        <form action="/checkout" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" value="{{Auth::user()->id}}" name="nhanvienid">
            <button type="submit" class="btn btn-primary">Checkout</button>
        </form>
        @endif
    @else
        <form action="/checkin" method="post" class="mr-1">
            @csrf
            @method('POST')
            <input type="hidden" value="{{Auth::user()->id}}" name="nhanvienid">
            <button type="submit" class="btn btn-primary">Checkin</button>
        </form>
        <form action="/checkout" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" value="{{Auth::user()->id}}" name="nhanvienid">
            <button type="submit" class="btn btn-primary">Checkout</button>
        </form>
    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script>
        function displayMessage(message) {
            toastr.success(message, 'Event');
        }

    </script>
    @if(session()->has('message'))
    <script>
        displayMessage("{{session()->get('message')}}")

    </script>
    @endif
</div>

<div>
    @include('layouts2.title', ['titlePage' => 'Hotel Overview'])
    @include('layouts2.overview')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{ Html::script('https://code.jquery.com/jquery-3.1.1.min.js') }}
        {{ Html::script('https://code.highcharts.com/highcharts.js') }}
        {{ Html::script('https://code.highcharts.com/modules/exporting.js') }}
        {{ Html::script('https://code.highcharts.com/modules/export-data.js') }}
        <div class="d-flex">
            <div id="container2" data-order="{{ $thanhtoan }}" class="col-6 card-box"></div>
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
                            categories: listOfYear
                        , },

                        series: [{
                            type: 'column'
                            , colorByPoint: true
                            , data: listOfValue
                            , showInLegend: false
                        }]
                    });

                    $('#plain').click(function() {
                        chart.update({
                            chart: {
                                inverted: false
                                , polar: false
                            }
                            , subtitle: {
                                text: 'Plain'
                            }
                        });
                    });

                    $('#inverted').click(function() {
                        chart.update({
                            chart: {
                                inverted: true
                                , polar: false
                            }
                            , subtitle: {
                                text: 'Inverted'
                            }
                        });
                    });

                    $('#polar').click(function() {
                        chart.update({
                            chart: {
                                inverted: false
                                , polar: true
                            }
                            , subtitle: {
                                text: 'Polar'
                            }
                        });
                    });
                });

            </script>

            <div id="container" data-order="{{ $thanhtoan }}" class="col-6 card-box ml-3"></div>
            <script>
                $(document).ready(function() {
                    var productBuy = $('#container').data('order');
                    var chartData = [];
                    productBuy.forEach(function(element) {
                        var ele = {
                            name: element.chuathanhtoan
                            , y: parseFloat(element.sochuathanhtoan)
                        };
                        chartData.push(ele);
                        var ele2 = {
                            name: element.dathanhtoan
                            , y: parseFloat(element.sodathanhtoan)
                        };
                        chartData.push(ele2);
                    });
                    console.log(chartData);
                    Highcharts.chart('container', {
                        chart: {
                            plotBackgroundColor: null
                            , plotBorderWidth: null
                            , plotShadow: false
                            , type: 'pie'
                        }
                        , title: {
                            text: 'Thanh toán'
                        }
                        , tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        }
                        , plotOptions: {
                            pie: {
                                allowPointSelect: true
                                , cursor: 'pointer'
                                , dataLabels: {
                                    enabled: false
                                }
                                , showInLegend: true
                            }
                        }
                        , series: [{
                            name: 'Brands'
                            , colorByPoint: true
                            , data: chartData
                        , }]
                    , });
                });

            </script>
        </div>
        <div id="container3" data-order="{{ $nhanphong }}" class="col-12 my-3 card-box"></div>
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
                        categories: listOfYear
                    , },

                    series: [{
                        type: 'column'
                        , colorByPoint: true
                        , data: listOfValue
                        , showInLegend: false
                    }]
                });

                $('#plain').click(function() {
                    chart.update({
                        chart: {
                            inverted: false
                            , polar: false
                        }
                        , subtitle: {
                            text: 'Plain'
                        }
                    });
                });

                $('#inverted').click(function() {
                    chart.update({
                        chart: {
                            inverted: true
                            , polar: false
                        }
                        , subtitle: {
                            text: 'Inverted'
                        }
                    });
                });

                $('#polar').click(function() {
                    chart.update({
                        chart: {
                            inverted: false
                            , polar: true
                        }
                        , subtitle: {
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
