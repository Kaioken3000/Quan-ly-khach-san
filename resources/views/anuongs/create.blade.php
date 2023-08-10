@hasrole('Admin')
    <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#ModalCreate">
        <i class="bx bx-plus mb-1"></i> Create Ăn uống
    </button>
@endhasrole
<!-- Modal Create -->
<div class="modal fade" id="ModalCreate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Create dịch vụ ăn uống</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('anuongs.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="ten">Tên</label>
                        <input type="text" name="ten" class="form-control" id="ten"
                            placeholder="VD: ăn uống" require="require" />
                        @error('ten')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="hinh">Hinh</label>
                        <input type="file" name="hinh" class="form-control" id="hinh" require="require" />
                        @error('hinh')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="soluong">Số lượng</label>
                        <input type="number" name="soluong" class="form-control" id="soluong" min=1
                            require="require" />
                        @error('soluong')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="gia">Giá</label>
                        <input type="number" name="gia" class="form-control" id="gia" min=0
                            require="require" />
                        @error('gia')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="mieuTa">Miêu tả</label>
                        <textarea id="mieuTa" name="mieuTa" class="form-control" placeholder="VD: Phòng đẹp, tiện nghi,.."
                            require="require"></textarea>
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
