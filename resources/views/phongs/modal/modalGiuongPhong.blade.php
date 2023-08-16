<span>
    <!-- Button trigger modal -->
    <button type="button" class="badge bg-danger" data-bs-toggle="modal"
        data-bs-target="#giuongphongxoa{{ $giuongphong->id }}">
        <i class="fas fa-trash"></i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="giuongphongxoa{{ $giuongphong->id }}" tabindex="-1"
        aria-labelledby="giuongphongxoa{{ $giuongphong->id }}Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Giuongphongxoa{{ $giuongphong->id }}Label">
                        Bạn có chắc
                        chắn muốn xoá</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <form action="{{ route('giuong_phong.destroy', $giuongphong->id) }}" method="Post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"> Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</span>
