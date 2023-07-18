@hasrole('Admin')
    <div class="my-1 col-4">
        <button type="button" class="btn btn-secondary" data-toggle="modal"
            data-target="#nhanphong{{ $datphong->datphongid }}">
            <i class="fa fa-hotel mb-1">
                {{ $datphong->tinhtrangnhanphong == 0 ? ' Nhận phòng' : ' Sửa nhận phòng' }}
            </i>
        </button>
    </div>
@else
    @if ($datphong->tinhtrangnhanphong == 0)
        <div class="my-1 col-4">
            <button type="button" class="btn btn-secondary" data-toggle="modal"
                data-target="#nhanphong{{ $datphong->datphongid }}">
                <i class="fa fa-hotel mb-1">
                    Nhận phòng
                </i>
            </button>
        </div>
    @endif
@endhasrole
<!-- Modal nhan phòng -->
<div class="modal fade" id="nhanphong{{ $datphong->datphongid }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1"> Xác nhận</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex gap-1">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                        No
                    </button>
                    <form class="m-1" action="{{ route('datphongs.nhanphong', $datphong->datphongid) }}"
                        method="Post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $datphong->datphongid }}">
                        <button type="submit" class="w-100 btn btn-secondary">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
