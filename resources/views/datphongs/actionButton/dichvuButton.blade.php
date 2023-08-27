<div class="">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modaldichvu{{ $datphong->id }}">
        <i class="fa fa-wrench"></i> Dịch vụ
    </button>
</div>
<!-- Modal dịch vụ -->
<div class="modal fade" id="modaldichvu{{ $datphong->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalDichvu">Chọn dịch vụ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dichvu_datphong.store') }}" method="POST">
                    @csrf
                    <input hidden type="text" value="{{$datphong->id}}" id="datphongid" name="datphongid">
                    <div class="mb-3">
                        <label class="form-label" for="ten">Dịch vụ</label><br>
                        @foreach($dichvus as $dichvu)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="dichvu{{$dichvu->id}}{{$datphong->id}}" name="dichvuid[]" value="{{$dichvu->id}}">
                            <label class="form-check-label" for="dichvu{{$dichvu->id}}{{$datphong->id}}">
                                {{$dichvu->ten}}:
                            </label>
                            <label class="form-check-label" for="dichvu{{$dichvu->id}}{{$datphong->id}}">
                                {{$dichvu->giatien}} {{$dichvu->donvi}}
                            </label>
                        </div>
                        @endforeach
                        @error('ten')
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
