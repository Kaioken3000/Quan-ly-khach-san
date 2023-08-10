<div class="m-1">
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#basicModal{{ $datphong->datphongid }}">
        Delete
    </button>
</div>
<!-- Modal xoá phòng -->
<div class="modal fade" id="basicModal{{ $datphong->datphongid }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1"> Bạn
                    có chắc
                    chắn muốn xoá</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="d-flex gap-1">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                        No
                    </button>
                    <form action="{{ route('client.xoadatphong', $datphong->datphongid) }}" method="Post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
