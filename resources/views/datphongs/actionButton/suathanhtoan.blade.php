<form class="my-1 col-6" action="{{ route('datphongs.chinhthanhtoan',$datphong->datphongid) }}" method="Post">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $datphong->datphongid }}">
    <input type="hidden" name="khachhang_id" value="{{ $datphong->id }}">
    <button type="submit" class="btn btn-link" data-color="red"><i class="fa fa-rotate-right mb-1"></i> Sửa thanh toán</button>
</form>
