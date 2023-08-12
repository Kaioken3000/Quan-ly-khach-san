<div class="row m-2">
    <div>
        @include('hinhs.create')
    </div>
    @foreach ($hinhs as $hinh)
        <div class="form-check col-3">
            <label class="form-check-label" for="hinh{{ $hinh->id }}">
                <div class="form-check-label" onclick="changeBoder(this,'hinh{{ $hinh->id }}')">
                    <img class="img-fluid" style="object-fit: cover; width: 300px;  max-height: 200px"
                        src="/client/images/{{ $hinh->vitri }}">
                    <div class="d-flex">
                        @include('hinhs.edit')
                        @include('hinhs.delete')
                    </div>
                </div>
            </label>
        </div>
        @endforeach
        @error('hinhid')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
</div>
