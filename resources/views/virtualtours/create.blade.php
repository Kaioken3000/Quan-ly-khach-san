@hasanyrole('MainAdmin|Admin')
    <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#ModalCreateVirtualtour">
        <i class="fas fa-plus"></i> Upload hình virtual tour <i class="fas fa-upload"></i>
    </button>
@endhasanyrole
<!-- Modal Create -->
<div class="modal fade" id="ModalCreateVirtualtour" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateVirtualtour">Tạo Virtualtour</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('virtualtours.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="hinh">Hình</label>
                        <input type="file" name="hinh[]" class="form-control" id="hinh" multiple/>
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
