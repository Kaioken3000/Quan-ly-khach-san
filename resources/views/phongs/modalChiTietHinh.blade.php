<!-- Button trigger modal -->
<button type="button" class="badge bg-primary" data-bs-toggle="modal"
    data-bs-target="#ModalChiTietHinh{{ $phong->so_phong }}">
    Chi tiết hình
</button>

<!-- Modal -->
<div class="modal fade" id="ModalChiTietHinh{{ $phong->so_phong }}" tabindex="-1" aria-labelledby="modalChiTietHinh"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="modalChiTietHinh">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @foreach ($phong->hinhphongs as $hinhphong)
                    <?php $hinh = App\Models\Hinh::where('id', $hinhphong->hinhid)->first(); ?>
                    <img data-bs-toggle="tooltip" data-bs-popup="tooltip-custom" data-bs-placement="top"
                        title="{{ $hinh->vitri }}" src="/client/images/{{ $hinh->vitri }}" class="img-fluid"
                        style="max-width: 300px">
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
