<!-- edit -->
<button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#ModalEdit{{ $dichvu->id }}">
    <i class="icon-copy fas fa-edit"></i>
</button>
<!-- Modal edit -->
<div class="modal fade" id="ModalEdit{{ $dichvu->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Dịch vụ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dichvus.update', $dichvu->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="ten">Tên dịch vụ</label>
                        <input type="text" name="ten" class="form-control" id="ten"
                            value="{{ $dichvu->ten }}" placeholder="VD: ăn uống" required />
                        @error('ten')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="giatien">Giá dịch vụ</label>
                        <input type="number" name="giatien" class="form-control" value="{{ $dichvu->giatien }}"
                            id="giatien" min=0 required />
                        @error('giatien')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="donvi">Đơn vị</label>
                        <input type="text" name="donvi" class="form-control" id="donvi"
                            value="{{ $dichvu->donvi }}" placeholder="VD: VND" required />
                        @error('donvi')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}</div>
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
