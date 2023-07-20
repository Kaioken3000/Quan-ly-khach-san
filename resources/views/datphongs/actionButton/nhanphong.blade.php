@hasrole('Admin')
    <p style="display:none">{{ $datphong->tinhtrangnhanphong == 0 ? 'Chưa' : 'check' }}</p>
    <div class="my-1 col-4">
        <button type="button"
            class=" badge
        {{ $datphong->tinhtrangnhanphong == 0 ? 'bg-danger' : ' bg-success' }}
        "
            data-bs-toggle="modal" data-bs-target="#nhanphong{{ $datphong->datphongid }}">
            <i class="fa fa-hotel"> </i>
            {{ $datphong->tinhtrangnhanphong == 0 ? ' Nhận phòng' : ' Sửa nhận phòng' }}
        </button>
    </div>
@else
    @if ($datphong->tinhtrangnhanphong == 0)
        <p style="display:none">Chưa</p>
        <div class="my-1 col-4">
            <button type="button" class="badge bg-danger" data-bs-toggle="modal"
                data-bs-target="#nhanphong{{ $datphong->datphongid }}">
                <i class="fa fa-hotel">
                </i>
                Nhận phòng
            </button>
        </div>
    @else
        <p style="display:none">check</p>
        <label class="badge bg-success">
            Xác nhận
        </label>
    @endif
@endhasrole
<!-- Modal nhan phòng -->
<div class="modal fade" id="nhanphong{{ $datphong->datphongid }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1"> Xác nhận</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex gap-1">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
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
