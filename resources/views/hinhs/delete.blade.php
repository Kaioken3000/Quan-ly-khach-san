<!-- Delete-->
<button type="button" class="btn btn-link" style="color:red" data-bs-toggle="modal"
    data-bs-target="#basicModal{{ $hinh->id }}">
    <i class="icon-copy fas fa-trash"></i>
</button>
<!-- Modal xoá  -->
<div class="modal fade" id="basicModal{{ $hinh->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1"> Bạn có chắc chắn muốn xoá
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex gap-1">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        No
                    </button>
                    <form action="{{ route('hinhs.destroy', $hinh->id) }}" method="Post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"> Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
