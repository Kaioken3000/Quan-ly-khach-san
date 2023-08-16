<!-- Create -->
@hasrole('Admin')
    <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#ModalCreate">
        <i class="fas fa-plus"></i> Create Ca trực
    </button>
@endhasrole
<!-- Modal Create -->
<div class="modal fade" id="ModalCreate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Create Ca trực</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('catrucs.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="ten">Tên ca trực</label>
                        <input type="text" name="ten" class="form-control" id="ten"
                            placeholder="VD: ăn uống" required />
                        @error('ten')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="giobatdau">Giờ bắt đầu</label>
                        <input type="time" name="giobatdau" class="form-control" id="giobatdau" min=0
                            required />
                        @error('giobatdau')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="gioketthuc">Giờ kết thúc</label>
                        <input type="time" name="gioketthuc" class="form-control" id="gioketthuc"
                            placeholder="VD: VNĐ" required value="VND" />
                        @error('gioketthuc')
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
