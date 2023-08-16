<!-- Button trigger modal -->
<button type="button" class="badge bg-danger" data-bs-toggle="modal"
    data-bs-target="#mieutaphongxoa{{ $mieutaphong->id }}">
    <i class="fas fa-trash"></i>
</button>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="mieutaphongxoa{{ $mieutaphong->id }}" tabindex="-1"
    aria-labelledby="mieutaphongxoa{{ $mieutaphong->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Mieutaphongxoa{{ $mieutaphong->id }}Label">
                    Bạn có chắc
                    chắn muốn xoá</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <form action="{{ route('mieuta_phong.destroy', $mieutaphong->id) }}" method="Post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"> Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
