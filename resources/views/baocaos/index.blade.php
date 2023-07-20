@extends('layouts3.app')

@section('content')
    @include('layouts3.title', ['titlePage' => 'Báo cáo'])
    <div class="row mb-5    ">
        <div class="col-4 d-flex gap-1 justify-content-start">
            <label for="thang" class="col-form-label">Tháng:</label>
            <div>
                <select class="form-control" aria-labe="Bao cao thang" id="thang" name="thang" style="width: 106px">
                    <option value="0">All</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
            </div>
            <div class="">
                <input type="submit" class="btn btn-primary" value="Báo cáo theo tháng" onclick="loctheothang()">
            </div>
        </div>
        <div class="col-8 d-flex gap-1">
            <label for="thang" class="col-form-label">Năm:</label>
            <div class="d-flex gap-1">
                <input type="text" id="nam" class="form-control" value="<?php echo date('Y'); ?>">
                <select class="form-control" aria-labe="Bao cao nam" id="namselect" name="namselect"
                    onchange="thaydoitheonamselect(event)">
                    <option value="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></option>
                    <option value="<?php echo date('Y') - 1; ?>"><?php echo date('Y') - 1; ?></option>
                    <option value="<?php echo date('Y') - 2; ?>"><?php echo date('Y') - 2; ?></option>
                    <option value="<?php echo date('Y') - 3; ?>"><?php echo date('Y') - 3; ?></option>
                </select>
            </div>
            <div>
                <input type="submit" class="btn btn-primary" value="Báo cáo theo năm" onclick="loctheonam()">
                <input type="submit" class="btn btn-primary" value="Báo cáo theo tháng và năm"
                    onclick="loctheothangvanam()">
            </div>
        </div>
        <div class="col-4 d-flex gap-1 justify-content-start">
            <label for="quy" class="col-form-label">Quý:&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <div>
                <select class="form-control" aria-labe="Bao cao quy" id="quy" name="quy">
                    <option value="0">All</option>
                    <option value="1,2,3">1 (1,2,3)</option>
                    <option value="4,5,6">2 (4,5,6)</option>
                    <option value="7,8,9">3 (7,8,9)</option>
                    <option value="10,11,12">4 (10,11,12)</option>
                </select>
            </div>
            <div class="">
                <input type="submit" class="btn btn-primary" value="Báo cáo theo quy" onclick="loctheoquy()">
            </div>
        </div>
    </div>

    <div class="">
        <table class="table" id="baocaotable">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Ngày đặt</th>
                    <th>Ngày trả</th>
                    <th>Số luọng</th>
                    <th colspan="2">Phòng hiện tại</th>
                    <th>Khách hàng</th>
                    <th>Thanh toán</th>
                    <th>Hoá đơn</th>
                    <th>Tổng tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datphongs as $datphong)
                    <tr>
                        <td>{{ $datphong->id }}</td>
                        <td>{{ $datphong->ngaydat }}</td>
                        <td>{{ $datphong->ngaytra }}</td>
                        <td>{{ $datphong->soluong }}</td>
                        <td>
                            <?php
                            $phongmax = App\Models\Danhsachdatphong::where('datphongid', $datphong->id)
                                ->orderBy('id', 'desc')
                                ->first();
                            ?>
                            {{ $phongmax->phongid }}
                        </td>
                        <td>
                            <form action="{{ route('danhsachdatphongs.index') }}" method="get">
                                <input type="hidden" name="datphongid" value="{{ $datphong->id }}">
                                <button class="badge bg-info" type="submit"> Lịch sử</button>
                            </form>
                        </td>
                        <td>{{ $datphong->khachhangid }}</td>
                        <td>
                            <label
                                class="badge {{ $datphong->tinhtrangthanhtoan == 0 ? 'badge-danger' : 'badge-success' }}">
                                {{ $datphong->tinhtrangthanhtoan == 0 ? 'Chưa' : 'Xác nhận' }}
                            </label>
                        </td>
                        <td>
                            <form action="generate-invoice-pdf" method="get">
                                @csrf
                                <input type="hidden" name="id" value="{{ $datphong->id }}">
                                <button type="submit" class="w-100 btn btn-info"><i class="bx bx-spreadsheet mb-1"></i>
                                    Xem hoá đơn</button>
                            </form>
                        </td>
                        <td>
                            <?php
                            $thanhtoans = App\Models\Thanhtoan::where('khachhangid', $datphong->khachhangid)->get();
                            ?>
                            <?php
                            // $danhsachdatphongs = App\Models\Danhsachdatphong::where('datphongid', $datphong->id)->get();
                            // $tonggia = 0;
                            // foreach ($danhsachdatphongs as $danhsachdatphong) {
                            //     //tim phong va loai phong
                            //     $phong = App\Models\Phong::find($danhsachdatphong->phongid);
                            //     $loaiphong = App\Models\Loaiphong::find($phong->loaiphongid);
                            
                            //     //tinh gia tien
                            //     $songay = strtotime($danhsachdatphong->ngayketthuco) - strtotime($danhsachdatphong->ngaybatdauo);
                            //     $songay = abs(round($songay / 86400));
                            //     $tonggia += $songay * $loaiphong->gia * $datphong->soluong;
                            // }
                            ?>
                            {{-- {{$tonggia}} VND --}}
                            @foreach ($thanhtoans as $thanhtoan)
                                @if ($thanhtoan->loaitien == 'traphong')
                                    {{ $thanhtoan->gia }} VND
                                @endif
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            <p id="tongcong">Tổng cộng: {{ $tonggiatatca }} VND</p>
        </div>
    </div>
    {{ Html::script('https://code.jquery.com/jquery-3.1.1.min.js') }}
    {{ Html::script('https://code.highcharts.com/highcharts.js') }}
    {{ Html::script('https://code.highcharts.com/modules/exporting.js') }}
    {{ Html::script('https://code.highcharts.com/modules/export-data.js') }}
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

    <script type="text/x-game-map">
            Highcharts.chart('container6', {
                chart: {
                    type: 'spline'
                    // column
                }
                , title: {
                    text: 'Số lượng ở các phòng'
                }
                , xAxis: {
                    categories: < ? php echo $phong ? > 
                , }
                , yAxis: {
                    title: {
                        text: 'Số lượng đã ở'
                    }
                }
                , tooltip: {
                    crosshairs: true
                    , shared: true
                }
                , plotOptions: {
                    spline: {
                        marker: {
                            radius: 4
                            , lineColor: '#666666'
                            , lineWidth: 1
                        }
                    }
                }
                , series: [{
                    name: 'Số phòng'
                    , marker: {
                        symbol: 'circle'
                    }
                    , data: < ? php echo $soluongphong ? >

                }]
            });
        </script>
    <script src="/adminresource/js/myscript.js"></script>

    <style>
        #baocaotable_length label,
        #baocaotable_filter label {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        #baocaotable_length label {
            width: 180px;
        }
    </style>
@endsection
