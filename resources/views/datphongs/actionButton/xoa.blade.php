<div class="my-1 col-4">
    <button type="button" class="w-100 btn btn-link" style="color:red" data-bs-toggle="modal" data-bs-target="#basicModal{{ $datphong->id }}">
        <i class="icon-copy fas fa-trash"></i>
    </button>
</div>
<!-- Modal xoá phòng -->
<div class="modal fade" id="basicModal{{ $datphong->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1"> Bạn có chắc chắn muốn xoá</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex gap-1">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        No
                    </button>
                    <form action="{{ route('datphongs.destroy',$datphong->id) }}" method="Post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"> Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
