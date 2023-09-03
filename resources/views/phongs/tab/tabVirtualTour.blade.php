<div class="row m-2">
    <div>
        @include('virtualtours.create')
    </div>
    @foreach ($virtualtours as $virtualtour)
        <div class="form-check col-3">
            <label class="form-check-label" for="virtualtour{{ $virtualtour->id }}">
                <div class="form-check-label" id="virtualtourDetail{{ $virtualtour->id }}" <?php
                if (isset($phong)) {
                    foreach ($phong->virtualtourphongs as $virtualtourphong) {
                        if ($virtualtour->id === $virtualtourphong->virtualtourid) {
                            echo 'style="border: 3px black solid"';
                        }
                    }
                }
                ?>
                    onclick="changeBoder('virtualtourDetail{{ $virtualtour->id }}','virtualtour{{ $virtualtour->id }}')">
                    <img class="img-fluid rounded " style="object-fit: cover; width: 300px;  max-height: 200px"
                        src="/client/images/{{ $virtualtour->hinh }}">
                </div>
            </label>
            <div class="d-flex align-items-center">
                @include('virtualtours.edit')
                @include('virtualtours.delete')
                <div>
                    <a href="/virtualtours-showpreview/{{ $virtualtour->id }}" target="_blank"
                        class="badge bg-primary">Xem chi tiết</a>
                </div>
            </div>
        </div>
    @endforeach
    @error('virtualtourid')
        <div class="alert alert-danger" role="alert">{{ $message }}</div>
    @enderror
</div>
