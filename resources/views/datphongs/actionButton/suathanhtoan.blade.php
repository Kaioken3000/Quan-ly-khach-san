@hasanyrole('MainAdmin|Admin')
    <form class="my-1 col-6" action="{{ route('datphongs.chinhthanhtoan', $datphong->id) }}" method="Post">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $datphong->id }}">
        <input type="hidden" name="khachhang_id" value="{{ $datphong->khachhangs->id }}">
        <button type="submit" class="badge bg-success">
            <i class="fa fa-rotate-right"></i> Sửa thanh toán</button>
    </form>
@endhasanyrole
