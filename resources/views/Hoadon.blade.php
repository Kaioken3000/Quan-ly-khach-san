<!DOCTYPE html>
<html>

<head>
    <title>Hoá đơn khách sạn</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<style type="text/css">
    body {
        font-family: DejaVu Sans, sans-serif;
    }

    .m-0 {
        margin: 0px;
    }

    .p-0 {
        padding: 0px;
    }

    .pt-5 {
        padding-top: 5px;
    }

    .mt-10 {
        margin-top: 10px;
    }

    .text-center {
        text-align: center !important;
    }

    .w-100 {
        width: 100%;
    }

    .w-50 {
        width: 50%;
    }

    .w-85 {
        width: 85%;
    }

    .w-15 {
        width: 15%;
    }

    .logo img {
        width: 45px;
        height: 45px;
        padding-top: 30px;
    }

    .logo span {
        margin-left: 8px;
        top: 19px;
        position: absolute;
        font-weight: bold;
        font-size: 25px;
    }

    .gray-color {
        color: #5D5D5D;
    }

    .text-bold {
        font-weight: bold;
    }

    .border {
        border: 1px solid black;
    }

    table tr,
    th,
    td {
        border: 1px solid #d2d2d2;
        border-collapse: collapse;
        padding: 7px 8px;
    }

    table tr th {
        background: #F4F4F4;
        font-size: 15px;
    }

    table tr td {
        font-size: 13px;
    }

    table {
        border-collapse: collapse;
    }

    .box-text p {
        line-height: 10px;
    }

    .float-left {
        float: left;
    }

    .total-part {
        font-size: 16px;
        line-height: 12px;
    }

    .total-right p {
        padding-right: 20px;
    }
</style>

<body>
    <div class="head-title">
        <h1 class="text-center m-0 p-0">QL khách san</h1>
    </div>
    <div class="add-detail mt-10">
        <div class="w-50 float-left mt-10">
            <h3>Thông tin khách hang:</h3>
            <p class="m-0 pt-5 text-bold w-100">Khách hàng Id - <span class="gray-color">{{ $khachhang->id }}</span></p>
            <p class="m-0 pt-5 text-bold w-100">Tên khách hàng- <span class="gray-color">{{ $khachhang->ten }}</span>
            </p>
            <p class="m-0 pt-5 text-bold w-100">Số điện thoại - <span class="gray-color">{{ $khachhang->sdt }}</span>
            </p>
            <p class="m-0 pt-5 text-bold w-100">Email - <span class="gray-color">{{ $khachhang->email }}</span></p>
        </div>
        <div class="w-50 float-left logo mt-10">
        </div>
        <div style="clear: both;"></div>
    </div>
    <div class="add-detail mt-10">
        <div class="w-50 float-left mt-10">
            <h3>Thông tin đặt phòng:</h3>
            <p class="m-0 pt-5 text-bold w-100">Id - <span class="gray-color">{{ $datphong->id }}</span></p>
            <p class="m-0 pt-5 text-bold w-100">Ngày đặt- <span class="gray-color">{{ $datphong->ngaydat }}</span></p>
            <p class="m-0 pt-5 text-bold w-100">Ngày trả- <span class="gray-color">{{ $datphong->ngaytra }}</span></p>
            <p class="m-0 pt-5 text-bold w-100">Số lượng - <span class="gray-color">{{ $datphong->soluong }}</span></p>
            <p class="m-0 pt-5 text-bold w-100">Khách hàng - <span class="gray-color">{{ $datphong->khachhangid}}</span></p>
            @if($tiendatcoc)
            <p class="m-0 pt-5 text-bold w-100">Tiền đặt cọc - <span class="gray-color">{{ $tiendatcoc->gia}}</span></p>
            @endif
        </div>
        <div class="w-50 float-left logo mt-10">
        </div>
        <div style="clear: both;"></div>
    </div>
    <div class="add-detail mt-10">
        <div class="w-50 float-left mt-10">
            <h3>Dịch vụ sử dụng:</h3>
            <?php $tongtiendv = 0;?>
            @foreach($dichvudatphongs as $dichvudatphong)
            <?php $tongtiendv += $dichvudatphong->dichvus->giatien;?>
            <p class="m-0 pt-5 text-bold w-100"><span class="gray-color">{{ $dichvudatphong->dichvus->ten }}: {{
                    $dichvudatphong->dichvus->giatien }} {{ $dichvudatphong->dichvus->donvi }}</span></p>
            @endforeach
        </div>
        <div class="w-50 float-left logo mt-10">
        </div>
        <div style="clear: both;"></div>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">Phòng</th>
                <th class="w-50">Loại phòng</th>
            </tr>
            <tr>
                <td>
                    <div class="box-text">
                        <?php $i=0; $tonggia = 0;?>
                        @foreach($danhsachdatphongs as $danhsachdatphong)
                        <?php $phong = App\Models\Phong::find($danhsachdatphong->phongid); 
                            $ngayhomnay = date("Y/m/d");

                            $ngaybatdau = $danhsachdatphong->ngaybatdauo;
                            $ngayketthuc = $danhsachdatphong->ngayketthuco;
                            $songay1 = abs(round((strtotime($ngayketthuc) - strtotime($ngaybatdau)) / 86400));
                            $songay2 = abs(round((strtotime($ngayhomnay) - strtotime($ngaybatdau)) / 86400));
                            if($i==0){
                                $tonggia+=($danhsachdatphong->phongs->loaiphongs->gia)*($songay1);
                            } else if($i!=(count($danhsachdatphongs)-1)) {
                                $tonggia+=($danhsachdatphong->phongs->loaiphongs->gia)*($songay1);
                            } else {
                                $tonggia+=($danhsachdatphong->phongs->loaiphongs->gia)*($songay2);
                            }
                        ?>
                        <p>Sô phòng: {{ $phong->so_phong }}</p>
                        <p>Loại phòng: {{ $phong->loaiphongid }}</p>
                        <p>Ngày bắt đầu ở: {{ $danhsachdatphong->ngaybatdauo }}</p>
                        <p>Ngày kết thúc ỏ: {{ $danhsachdatphong->ngayketthuco }}</p>
                        @if($i!=(count($danhsachdatphongs)-1) || $i==0)
                            <p>So ngay o: {{ $songay1 }}</p>
                        @else
                            <p>So ngay o: {{ $songay2 }}</p>
                        @endif
                        <hr>
                        <?php $i++;?>
                        @endforeach

                    </div>
                </td>
                <td>
                    <div class="box-text">
                        @foreach($danhsachdatphongs as $danhsachdatphong)
                        <?php $p = App\Models\Phong::find($danhsachdatphong->phongid);
                        $loaiphong = App\Models\LoaiPhong::find($p->loaiphongid); ?>
                        <p>Mã: {{ $loaiphong->ma }}</p>
                        <p>Tên: {{ $loaiphong->ten }}</p>
                        <p>Giá: {{ $loaiphong->gia }}VND</p>
                        <p>Sô lượng: {{ $loaiphong->soluong }}</p>
                        <p>Miêu tả: {{ $loaiphong->mieuta }}</p>
                        <hr>
                        @endforeach
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <td colspan="7">
                    <div class="total-part">
                        <div class="total-left w-85 float-left" align="right">
                            @if($tiendatcoc)
                            <p>Tổng cộng: {{ $tonggia + $tongtiendv - $tiendatcoc->gia}}VND</p>
                            @endif
                            <p>Tổng cộng: {{ $tonggia + $tongtiendv}}VND</p>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                </td>
            </tr>
        </table>
    </div>

</html>