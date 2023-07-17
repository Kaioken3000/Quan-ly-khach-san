<div class="my-1 col-4">
    <button type="button" class="w-100 btn btn-link" data-color="green" data-toggle="modal" data-target="#modaldichvu{{ $datphong->datphongid }}">
        &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-wrench mb-1"></i> Dịch vụ &nbsp; &nbsp;&nbsp;
    </button>
</div>
<!-- Modal dịch vụ -->
<div class="modal fade" id="modaldichvu{{ $datphong->datphongid }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Chọn dịch vụ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dichvu_datphong.store') }}" method="POST">
                    @csrf
                    <input hidden type="text" value="{{$datphong->datphongid}}" id="datphongid" name="datphongid">
                    <div class="mb-3">
                        <label class="form-label" for="ten">Dịch vụ</label><br>
                        @foreach($dichvus as $dichvu)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="dichvu{{$dichvu->id}}" name="dichvuid[]" value="{{$dichvu->id}}">
                            <label class="form-check-label" for="dichvu{{$dichvu->id}}">
                                {{$dichvu->ten}}:
                            </label>
                            <label class="form-check-label" for="dichvu{{$dichvu->id}}">
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
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                    Cancel
                </button>
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </div>
            </form>
        </div>
    </div>
</div>
