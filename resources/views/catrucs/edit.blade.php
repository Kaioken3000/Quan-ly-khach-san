<!-- edit -->
<button type="button" class="btn btn-link" data-toggle="modal" data-target="#ModalEdit{{ $catruc->id }}">
    <i class="icon-copy fas fa-edit"></i>
</button>
<!-- Modal edit -->
<div class="modal fade" id="ModalEdit{{ $catruc->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Ca trực</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('catrucs.update', $catruc->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="ten">Tên ca trực</label>
                        <input type="text" name="ten" class="form-control" id="ten"
                            value="{{ $catruc->ten }}" placeholder="VD: ăn uống" require="require" />
                        @error('ten')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="giobatdau">Giờ bắt đầu</label>
                        <input type="time" name="giobatdau" class="form-control" value="{{ $catruc->giobatdau }}"
                            id="giobatdau" min=0 require="require" />
                        @error('giobatdau')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="gioketthuc">Giờ kết thúc</label>
                        <input type="time" name="gioketthuc" class="form-control" id="gioketthuc"
                            value="{{ $catruc->gioketthuc }}" placeholder="VD: VND" require="require" />
                        @error('gioketthuc')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                    Cancel
                </button>
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </div>
            </form>
        </div>
    </div>
</div>
