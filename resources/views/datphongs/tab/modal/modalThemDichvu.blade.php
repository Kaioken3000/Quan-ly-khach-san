<!-- Button trigger modal -->
<button type="button" class="badge bg-danger" data-bs-toggle="modal"
    data-bs-target="#dichvudatphongxoa{{ $dichvudatphong->id }}{{ $datphong->datphongid }}">
    <i class="fas fa-trash"></i>
</button>
<!-- Modal -->
<div class="modal fade" id="dichvudatphongxoa{{ $dichvudatphong->id }}{{ $datphong->datphongid }}" tabindex="-1"
    aria-labelledby="dichvudatphongxoa{{ $dichvudatphong->id }}{{ $datphong->datphongid }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Dichvudatphongxoa{{ $dichvudatphong->id }}{{ $datphong->datphongid }}Label">
                    Bạn có chắc chắn muốn xoá</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <form action="{{ route('dichvu_datphong.destroy', $dichvudatphong->id) }}" method="Post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
