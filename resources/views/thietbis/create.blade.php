@hasrole('Admin')
    <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#ModalCreateThietbi">
        <i class="fas fa-plus"></i> Create Thiết bị
    </button>
@endhasrole
<!-- Modal Create -->
<div class="modal fade" id="ModalCreateThietbi" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateThietbi">Create Thiết bị</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('thietbis.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="ten">Tên thiết bị</label>
                        <input type="text" name="ten" class="form-control" id="ten"
                            placeholder="VD: ăn uống" required />
                        @error('ten')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="hinh">Hình thiết bị</label>
                        <input type="file" name="hinh" class="form-control" id="hinh"
                            placeholder="VD: ăn uống" required />
                        @error('hinh')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="gia">Giá thiết bị</label>
                        <input type="number" name="gia" class="form-control" id="gia" min=0
                            required />
                        @error('gia')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="mieuTa">Miêu tả</label>
                        <textarea id="mieuTa" name="mieuTa" class="form-control" required></textarea>
                        @error('mieuTa')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </div>
            </form>
        </div>
    </div>
</div>
