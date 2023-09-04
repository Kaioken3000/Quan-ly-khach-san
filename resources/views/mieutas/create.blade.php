@hasanyrole('MainAdmin|Admin')
    <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#ModalCreateMieuta">
        <i class="fas fa-plus"></i> Tạo Miêu tả
    </button>
@endhasanyrole
<!-- Modal Create -->
<div class="modal fade" id="ModalCreateMieuta" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateMieuta">Tạo Miêu tả</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('mieutas.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="noidung">Nội dung</label>
                        {{-- <textarea id="noidung" name="noidung" class="form-control" required cols="90" rows="20"></textarea> --}}
                        <textarea class="tinymce" name="noidung" id="noidung" data-tinymce="{}"></textarea>
                        @error('noidung')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="hinh">Hình</label>
                        <input type="file" name="hinh" class="form-control" id="hinh" />
                        @error('hinh')
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
