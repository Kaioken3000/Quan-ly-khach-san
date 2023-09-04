@hasanyrole('MainAdmin|Admin')
    <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#ModalCreate">
        <i class="fas fa-plus"></i> Tạo Ăn uống
    </button>
@endhasanyrole
<!-- Modal Create -->
<div class="modal fade" id="ModalCreate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tạo dịch vụ ăn uống</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('anuongs.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="ten">Tên</label>
                        <input type="text" name="ten" class="form-control" id="ten"
                            placeholder="VD: ăn uống" required />
                        @error('ten')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="hinh">Hinh</label>
                        <input type="file" name="hinh" class="form-control" id="hinh" required />
                        @error('hinh')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="soluong">Số lượng</label>
                        <input type="number" name="soluong" class="form-control" id="soluong" min=1 required />
                        @error('soluong')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="gia">Giá</label>
                        <input type="number" name="gia" class="form-control" id="gia" min=0 required />
                        @error('gia')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="chinhanhid">Chi nhánh</label>
                        <select class="form-control" id="chinhanhid" name="chinhanhid">
                            @foreach ($chinhanhs as $chinhanh)
                                <option value="{{ $chinhanh->id }}"
                                    @if (isset($phong)) @if ($chinhanh->id === $phong->chinhanhid)
                                            selected @endif
                                    @endif
                                    >{{ $chinhanh->ten }}
                                </option>
                            @endforeach
                        </select>
                        @error('chinhanhid')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="mieuTa">Miêu tả</label>
                        <textarea id="mieuTa" name="mieuTa" class="form-control" placeholder="VD: Phòng đẹp, tiện nghi,.." required></textarea>
                        @error('mieuTa')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="diem">Điểm dịch vụ ăn uống</label>
                        <input type="number" name="diem" class="form-control" id="diem" min=0 required
                            value="1000" />
                        @error('diem')
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
