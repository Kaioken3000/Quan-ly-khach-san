<!-- Create -->
@hasrole('Admin')
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalCreate">
        <i class="bx bx-plus mb-1"></i> Create Phòng
    </button>
    <!-- Modal Create -->
    <div class="modal fade" id="ModalCreate" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Create phòng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('phongs.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="so_phong">Sô phòng</label>
                            <input type="number" name="so_phong" class="form-control" id="so_phong"
                                placeholder="VD: 001" />
                            @error('so_phong')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="picture_1">Hinh phòng 1</label>
                            <input type="file" name="picture_1" class="form-control" id="picture_1" require="require" />
                            @error('picture_1')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="picture_2">Hinh phòng 2</label>
                            <input type="file" name="picture_2" class="form-control" id="picture_2" require="require" />
                            @error('picture_2')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="picture_3">Hinh phòng 3</label>
                            <input type="file" name="picture_3" class="form-control" id="picture_3" require="require" />
                            @error('picture_3')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="loaiphongid">Loại phòng</label>
                            <select class="form-control" id="loaiphongid" name="loaiphongid">
                                @foreach ($loaiphongs as $loaiphong)
                                    <option value="{{ $loaiphong->ma }}">{{ $loaiphong->ten }}</option>
                                @endforeach
                            </select>
                            @error('loaiphongid')
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
@endhasrole
