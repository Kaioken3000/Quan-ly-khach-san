<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hoá đơn khách sạn</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="./dompdf/style.css">
</head>

<body>
    <div class="container">

        <table width="100%">
            <tr>
                <td width="75px">
                    <div class="logotype" style="line-height: 60px;">
                        Copmany</div>
                    {{-- <img src="./Phoenix_files/logo.png" alt=""> --}}
                </td>
                <td width="400px">
                    <div
                        style="background: #ffd9e8;border-left: 15px solid #fff;padding-left: 30px;font-size: 26px;font-weight: bold;letter-spacing: -1px;height: 73px;line-height: 60px;">
                        Hóa đơn đặt phòng</div>
                </td>
                <td>
                    <ul>
                        <li>Mẫu số:06AAFCD6498P1ZT</li>
                        <li>Ký hiệu:NP1SP</li>
                        <br>
                        <li>Số:{{ $datphong->id }}</li>
                    </ul>
                </td>
            </tr>
        </table>
        <br>
        <ul style="padding: 0px; margin: 0px; list-style-type: none;">
            <li>Đơn vị: Công ty TNHH Khách sạn sogo</li>
            <li>Số điện thoại: (12) 345 67890</li>
            <li>Email: info.colorlib@gmail.com</li>
            <li>Địa chỉ: 856 Cordia Extension Apt. 356, Lake, United State</li>
        </ul>
        <br>
        {{-- Thông tin khách hàng --}}
        <h3>Thông tin khách hàng</h3>
        <table width="100%" style="border-collapse: collapse;">
            <tr>
                <td widdth="50%" style="background:#eee;padding:20px;">
                    <strong>Khách hàng Id:</strong> {{ $khachhang->id }}<br>
                    <strong>Tên khách hàng:</strong>{{ $khachhang->ten }}<br>
                </td>
                <td style="background:#eee;padding:20px;">
                    <strong>Số điện thoại:</strong> {{ $khachhang->sdt }}<br>
                    <strong>E-mail:</strong>{{ $khachhang->email }}<br>
                </td>
            </tr>
        </table><br>
        {{-- Kết thúc thông tin khách hàng --}}
        {{-- Thông tin đặt phòng --}}
        <h3>Thông tin đặt phòng</h3>
        <table width="100%">
            <tr>
                <td width="50%">
                    <strong>Mã đặt phòng:</strong> {{ $datphong->id }}<br>
                    <strong>Ngày đặt:</strong>{{ $datphong->ngaydat }}<br>
                    <strong>Ngày trả:</strong>{{ $datphong->ngaytra }}<br>
                </td>
                <td>
                    <strong>Số lượng người ở:</strong> {{ $datphong->soluong }}<br>
                    <strong>Khách hàng:</strong>{{ $datphong->khachhangid }}<br>
                    @if ($tiendatcoc)
                        <strong>Tiền đặt cọc:</strong>
                        {{ $tiendatcoc->gia }}
                    @endif
                    <br>
                </td>
            </tr>
        </table><br>
        {{-- Kết thúc thông tin đặt phòng --}}
        {{-- <div class="add-detail mt-10">
            <div class="w-50 float-left mt-10">
                <h3>Dịch vụ sử dụng:</h3>
                <?php //$tongtiendv = 0;
                ?>
                <div>
                    <div>
                        <h4>Dịch vụ thường: </h4>
                        <ul>
                            @foreach ($dichvudatphongs as $dichvudatphong)
                                <?php //$tongtiendv += $dichvudatphong->dichvus->giatien;
                                ?>
                                <li class="m-0 pt-5 text-bold w-100"><span
                                        class="gray-color">{{ $dichvudatphong->dichvus->ten }}:
                                        {{ $dichvudatphong->dichvus->giatien }}
                                        {{ $dichvudatphong->dichvus->donvi }}</span></li>
                            @endforeach
                        </ul>
                    </div>

                    <div>
                        <h4>Dịch vụ ăn uống: </h4>
                        @foreach ($anuongdatphongs as $anuongdatphong)
                            <?php //$tongtiendv += $anuongdatphong->anuongs->gia;
                            ?>
                            <p class="m-0 pt-5 text-bold w-100"><span
                                    class="gray-color">{{ $anuongdatphong->anuongs->ten }}:
                                    {{ $anuongdatphong->anuongs->gia }} VND - Số lượng:
                                    {{ $anuongdatphong->soluong }}</span>
                            </p>
                        @endforeach
                    </div>
                </div>

            </div>
        </div> --}}
        <?php $tongtiendv = 0; ?>
        <h3>Thông tin dịch vụ</h3>
        <table width="100%" style="border-collapse: collapse;">
            <tr>
                <td width="50%" style="background:#eee;padding:20px;">
                    <strong>Dịch vụ thường</strong><br>
                    <strong></strong><br>
                    @foreach ($dichvudatphongs as $dichvudatphong)
                        <?php $tongtiendv += $dichvudatphong->dichvus->giatien; ?>
                        <strong>{{ $dichvudatphong->dichvus->ten }}:</strong> {{ $dichvudatphong->dichvus->giatien }}
                        {{ $dichvudatphong->dichvus->donvi }}<br>
                    @endforeach
                </td>
                <td style="background:#eee;padding:20px;">
                    <strong>Dịch vụ ăn uống</strong><br>
                    <strong></strong><br>
                    @foreach ($anuongdatphongs as $anuongdatphong)
                        <?php $tongtiendv += $anuongdatphong->anuongs->gia * $anuongdatphong->soluong; ?>
                        <strong>{{ $anuongdatphong->anuongs->ten }}:</strong> {{ $anuongdatphong->anuongs->gia }}
                        VND -
                        Số lượng: {{ $anuongdatphong->soluong }}<br>
                    @endforeach
                </td>
            </tr>
        </table><br>
        <br>

        <h3>Các phòng đã ở</h3>
        <table width="100%" style="border-collapse: collapse;border-bottom:1px solid #eee;">
            <tr>
                <td class="column-header">Phòng</td>
                <td style="width: 100px" class="column-header">Giá phòng</td>
                <td class="column-header">Loại phòng</td>
                <td class="column-header">Số lượng người ở</td>
                <td class="column-header">Ngày bắt đầu ở</td>
                <td class="column-header">Ngày kết thúc ở</td>
                <td class="column-header">Số ngày ở</td>
            </tr>

            <?php $i = 0;
            $tonggia = 0; ?>
            @foreach ($danhsachdatphongs as $danhsachdatphong)
                <tr>
                    <?php $phong = App\Models\Phong::find($danhsachdatphong->phongid);
                    $ngayhomnay = date('Y/m/d');
                    
                    $ngaybatdau = $danhsachdatphong->ngaybatdauo;
                    $ngayketthuc = $danhsachdatphong->ngayketthuco;
                    $songay1 = abs(round((strtotime($ngayketthuc) - strtotime($ngaybatdau)) / 86400));
                    $songay2 = abs(round((strtotime($ngayhomnay) - strtotime($ngaybatdau)) / 86400));
                    if ($i == 0) {
                        $tonggia += $danhsachdatphong->phongs->loaiphongs->gia * $songay1;
                    } elseif ($i != count($danhsachdatphongs) - 1) {
                        $tonggia += $danhsachdatphong->phongs->loaiphongs->gia * $songay1;
                    } else {
                        $tonggia += $danhsachdatphong->phongs->loaiphongs->gia * $songay2;
                    }
                    ?>
                    <td class="row">{{ $phong->so_phong }}</td>
                    <td class="row">{{ $phong->loaiphongs->gia }} VND</td>
                    <td class="row">{{ $phong->loaiphongid }}</td>
                    <td class="row">
                        <?php $soluongnguoio = App\Models\Datphong::where('khachhangid', $khachhang->id)->first(); ?>
                        {{ $soluongnguoio->soluong }} người
                    </td>
                    <td class="row">{{ $danhsachdatphong->ngaybatdauo }}</td>
                    <td class="row">{{ $danhsachdatphong->ngayketthuco }}</td>
                    @if ($i != count($danhsachdatphongs) - 1 || $i == 0)
                        <td class="row">{{ $songay1 }} ngày</td>
                    @else
                        <td class="row">{{ $songay2 }} ngày</td>
                    @endif
                    <?php $i++; ?>
                </tr>
            @endforeach
        </table>
        <br>

        <table width="100%" style="background:#eee;padding:20px; height: 20px">
            <tr>
                <td>
                    <table width="180px" style="float:right">
                        <tr>
                            <td><strong>Tổng cộng:</strong></td>
                            {{-- <td style="text-align:right">
                                @if ($tiendatcoc)
                                    {{ $tonggia + $tongtiendv - $tiendatcoc->gia }}VND
                                @else
                                    {{ $tonggia + $tongtiendv }}VND
                                @endif
                            </td> --}}
                            <td style="text-align:right">
                                <?php $thanhtoan = App\Models\Thanhtoan::where('datphongid', $datphong->id)->latest("id")->first(); ?>
                                @if ($thanhtoan->loaitien == 'traphong')
                                    {{ $thanhtoan->gia }} VND
                                @endif
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;
            <script>
                document.write(new Date().getFullYear());
            </script> All rights reserved | This template is made with <i class="fa fa-heart"
                aria-hidden="true"></i> by <a href="#" target="_blank">nam</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
    </div><!-- container -->
</body>

</html>
