{{-- <!DOCTYPE HTML>
<html>
@include('client.layouts.head')

<body>

    @include('client.layouts.header')
    <div class="card-box m-4">
        <div class="card-header">
            <h3 class="text-muted">VNPAY RESPONSE</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Mã đơn hàng:</label>

                <label class="form-label">
                    {{ $request->vnp_TxnRef }} ?>
                </label>
            </div>
            <div class="mb-3">

                <label class="form-label">Số tiền:</label>
                <label class="form-label">
                    {{ $request->vnp_Amount}} ?>
                </label>
            </div>
            <div class="mb-3">
                <label class="form-label">Nội dung thanh toán:</label>
                <label class="form-label">
                    {{ $request->vnp_OrderInfo}} ?>
                </label>
            </div>
            <div class="mb-3">
                <label class="form-label">Mã phản hồi (vnp_ResponseCode):</label>
                <label class="form-label">
                    {{ $request->vnp_ResponseCode}} ?>
                </label>
            </div>
            <div class="mb-3">
                <label class="form-label">Mã GD Tại VNPAY:</label>
                <label class="form-label">
                    {{ $request->vnp_TransactionNo}} ?>
                </label>
            </div>
            <div class="mb-3">
                <label class="form-label">Mã Ngân hàng:</label>
                <label class="form-label">
                    {{ $request->vnp_BankCode}} ?>
                </label>
            </div>
            <div class="mb-3">
                <label class="form-label">Thời gian thanh toán:</label>
                <label class="form-label">
                    {{ $request->vnp_PayDate}} ?>
                </label>
            </div>
            <div class="mb-3">
                <label class="form-label">Kết quả:</label>
                <label class="form-label">
                    <?php
                    if ($secureHash == $vnp_SecureHash) {
                        if ($request->vnp_ResponseCode == '00') {
                            echo "<span style='color:blue'>GD Thanh cong</span>";
                        } else {
                            echo "<span style='color:red'>GD Khong thanh cong</span>";
                        }
                    } else {
                        echo "<span style='color:red'>Chu ky khong hop le</span>";
                    }
                    ?>
                </label>
            </div>
        </div>
        <p>
            &nbsp;
        </p>
        <footer class="card-footer">
            <p>&copy; VNPAY
                <?php echo date('Y')?>
            </p>
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

    {{-- @include('client.layouts2.loader') --}}

    @include('client.layouts2.header')

    @include('client.layouts2.menu')

    @include('client.layouts2.paycheckSuccess')

    @include('client.layouts2.footer')

    @include('client.layouts2.search')

    @include('client.layouts2.script')

</body>

</html>
