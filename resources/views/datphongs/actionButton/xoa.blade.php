<div class="my-1 col-4">
    <button type="button" class="w-100 btn btn-link" data-color="#e95959" data-toggle="modal" data-target="#basicModal{{ $datphong->datphongid }}">
        <i class="icon-copy dw dw-delete-3"></i>
    </button>
</div>
<!-- Modal xoá phòng -->
<div class="modal fade" id="basicModal{{ $datphong->datphongid }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1"> Bạn có chắc chắn muốn xoá</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex gap-1">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                        No
                    </button>
                    <form action="{{ route('datphongs.destroy',$datphong->datphongid) }}" method="Post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"> Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
