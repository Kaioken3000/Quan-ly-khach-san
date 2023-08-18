<!-- Button trigger modal -->
<button type="button" class="badge bg-danger" data-bs-toggle="modal"
    data-bs-target="#anuongdatphongxoa{{ $anuongdatphong->id }}{{ $datphong->id }}">
    <i class="fas fa-trash"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="anuongdatphongxoa{{ $anuongdatphong->id }}{{ $datphong->id }}" tabindex="-1"
    aria-labelledby="anuongdatphongxoa{{ $anuongdatphong->id }}{{ $datphong->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Anuongdatphongxoa{{ $anuongdatphong->id }}{{ $datphong->id }}Label">
                    Bạn có
                    chắc
                    chắn muốn xoá</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <form action="{{ route('anuong_datphong.destroy', $anuongdatphong->id) }}" method="Post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
