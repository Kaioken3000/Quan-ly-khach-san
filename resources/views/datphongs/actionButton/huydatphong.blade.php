<div class="col-4">
    <button type="button" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#huydatphong{{ $datphong->id }}">
        <i class="fa fa-times"></i>
        {{ ($datphong->huydatphong == 0) ? ' Huỷ đặt' : ' Hoàn tác' }}
    </button>
</div>
<!-- Modal huỷ đặt phòng -->
@hasrole("MainAdmin")
<div class="modal fade" id="huydatphong{{ $datphong->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Bạn có chắc chắn muốn huỷ đặt phòng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex gap-1">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        No
                    </button>
                    <form action="{{ route('huydatphongs.store',$datphong->id) }}" method="Post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"> Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endhasrole
