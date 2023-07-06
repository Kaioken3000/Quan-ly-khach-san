{{-- <!DOCTYPE HTML>
<html>
@include('client.layouts.head')

<body>

    @include('client.layouts.header') --}}
    <?php //require_once("config.php");?>
    {{-- <div class="card m-4">
        <h3 class="card-header">Tạo mới đơn hàng</h3>
        <div class="table-responsive card-body">
            <form action="{{ route('client.thanhtoanvnpay') }}" id="frmCreateOrder" method="post">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="amount">Số tiền</label>
                    <input class="form-control" data-val="true" data-val-number="The field Amount must be a number." data-val-required="The Amount field is required." id="amount" max="100000000" min="1" name="amount" type="number" value="{{$request->sotien}}" />
                </div>
                <h4>Chọn phương thức thanh toán </h4>
                <div class="mb-3">
                    <h5 class="mt-3">Cách 1: Chuyển hướng sang Cổng VNPAY chọn phương thức thanh toán</h5>
                    <input type="radio" Checked="True" id="bankCode" name="bankCode" value="">
                    <label for="bankCode">Cổng thanh toán VNPAYQR</label><br>

                    <h5 class="mt-3">Cách 2: Tách phương thức tại site của đơn vị kết nối</h5>
                    <input type="radio" id="bankCode" name="bankCode" value="VNPAYQR">
                    <label for="bankCode">Thanh toán bằng ứng dụng hỗ trợ VNPAYQR</label><br>

                    <input type="radio" id="bankCode" name="bankCode" value="VNBANK">
                    <label for="bankCode">Thanh toán qua thẻ ATM/Tài khoản nội địa</label><br>

                    <input type="radio" id="bankCode" name="bankCode" value="INTCARD">
                    <label for="bankCode">Thanh toán qua thẻ quốc tế</label><br>

                </div>
                <div class="mb-3">
                    <h5>Chọn ngôn ngữ giao diện thanh toán:</h5>
                    <input type="radio" id="language" Checked="True" name="language" value="vn">
                    <label for="language">Tiếng việt</label><br>
                    <input type="radio" id="language" name="language" value="en">
                    <label for="language">Tiếng anh</label><br>

                </div>
                <button type="submit" class="btn btn-success" href>Thanh toán &nbsp; <i class="fas fa-money-check"></i></button>

                <input type="hidden" value="{{$request->datphongid}}" name="datphongid">
                <input type="hidden" value="{{$request->loaitien}}" name="loaitien">
                <input type="hidden" value="{{$request->khachhangid}}" name="khachhangid">
            </form>
        </div>
        <p>
            &nbsp;
        </p>
        <footer class="card-footer">
            <p>&copy; VNPAY 2020</p>
        </footer>
    </div>
    @include('client.layouts.footer')

    @include('client.layouts.script')

</body>

</html> --}}

<!DOCTYPE html>
<html lang="vi">

@include('client.layouts2.head')

<body>

    @include('client.layouts2.loader')

    @include('client.layouts2.header')

    @include('client.layouts2.menu')

    @include('client.layouts2.paycheck')

    @include('client.layouts2.footer')

    @include('client.layouts2.search')

    @include('client.layouts2.script')

</body>

</html>
