@hasanyrole('MainAdmin|Admin')
    <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#ModalCreate">
        <i class="fas fa-plus"></i> Create Dịch vụ
    </button>
@endhasanyrole
<!-- Modal Create -->
<div class="modal fade" id="ModalCreate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Create Dịch vụ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dichvus.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="ten">Tên dịch vụ</label>
                        <input type="text" name="ten" class="form-control" id="ten"
                            placeholder="VD: ăn uống" required />
                        @error('ten')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="giatien">Giá dịch vụ</label>
                        <input type="number" name="giatien" class="form-control" id="giatien" min=0 required />
                        @error('giatien')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label" for="donvi">Đơn vị</label>
                        <input type="text" name="donvi" class="form-control" id="donvi" placeholder="VD: VNĐ"
                            required value="VND" />
                        @error('donvi')
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
