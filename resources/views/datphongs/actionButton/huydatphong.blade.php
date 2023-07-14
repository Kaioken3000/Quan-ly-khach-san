<div class="my-1 col-4">
    <button type="button" class="btn btn-light" data-color="#e95959"  data-toggle="modal" data-target="#huydatphong{{ $datphong->datphongid }}">
        <i class="icon-copy fa fa-times"></i>
        {{ ($datphong->huydatphong == 0) ? ' Huỷ đặt phòng' : ' Hoàn tác' }}
    </button>
</div>
<!-- Modal huỷ đặt phòng -->
<div class="modal fade" id="huydatphong{{ $datphong->datphongid }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Bạn có chắc chắn muốn huỷ đặt phòng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex gap-1">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                        No
                    </button>
                    <form action="{{ route('huydatphongs.store',$datphong->datphongid) }}" method="Post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"> Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
