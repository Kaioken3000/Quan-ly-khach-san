@hasanyrole('MainAdmin|Admin')
    <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#ModalCreate">
        <i class="fas fa-plus"></i> Tạo Loại phòng
    </button>
    <!-- Modal Create -->
    <div class="modal fade" id="ModalCreate" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Create Loại phòng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('loaiphongs.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="ma">Mã loại phòng</label>
                            <input type="text" name="ma" class="form-control" id="ma" placeholder="VD: P1"
                                required />
                            @error('ma')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="ten">Tên loại phòng</label>
                            <input type="text" name="ten" class="form-control" id="ten"
                                placeholder="VD: Phòng VIP" required />
                            @error('ten')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="gia">Giá loại phòng</label>
                            <input type="number" name="gia" class="form-control" id="gia" min=0
                                required />
                            @error('gia')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="hinh">Hinh loại phòng</label>
                            <input type="file" name="hinh" class="form-control" id="hinh" required />
                            @error('hinh')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="soluong">Số lượng</label>
                            <input type="number" name="soluong" class="form-control" id="soluong" min=1
                                required />
                            @error('soluong')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="mieuTa">Miêu tả</label>
                            <textarea id="mieuTa" name="mieuTa" class="form-control" placeholder="VD: Phòng đẹp, tiện nghi,.."
                                required></textarea>
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
@endhasanyrole
