@hasrole('Admin')
    <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#ModalCreate">
        <i class="fas fa-plus"></i> Upload hình <i class="fas fa-upload"></i>
    </button>
@endhasrole
<!-- Modal Create -->
<div class="modal fade" id="ModalCreate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Create HÌnh</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('hinhs.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="vitri">Hình</label>
                        <input type="file" name="vitri" class="form-control" id="vitri"/>
                        @error('vitri')
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
