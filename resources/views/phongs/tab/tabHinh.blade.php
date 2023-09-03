<div class="row m-2">
    <div>
        @include('hinhs.create')
    </div>
    @foreach ($hinhs as $hinh)
        <div class="form-check col-3">
            <label class="form-check-label" for="hinh{{ $hinh->id }}">
                <div class="form-check-label" id="hinhDetail{{ $hinh->id }}" <?php
                if (isset($phong)) {
                    foreach ($phong->hinhphongs as $hinhphong) {
                        if ($hinh->id === $hinhphong->hinhid) {
                            echo 'style="border: 3px black solid"';
                        }
                    }
                }
                ?>
                    onclick="changeBoder('hinhDetail{{ $hinh->id }}','hinh{{ $hinh->id }}')">
                    <img class="img-fluid rounded " style="object-fit: cover; width: 300px;  max-height: 200px"
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
