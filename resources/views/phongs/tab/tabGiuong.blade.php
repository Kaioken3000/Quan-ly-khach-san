<div class="row m-2">
    <div>
        @include('giuongs.create')
    </div>
    @foreach ($giuongs as $giuong)
        <div class="form-check col-4">
            <label class="form-check-label" for="giuong{{ $giuong->id }}">
                <div class="card form-check-label" <?php
                if (isset($phong)) {
                    foreach ($phong->giuongphongs as $giuongphong) {
                        if ($giuong->id === $giuongphong->giuongid) {
                            echo 'style="border: 3px black solid"';
                        }
                    }
                }
                ?> id="giuongDetail{{ $giuong->id }}"
                    onclick="changeBoder('giuongDetail{{ $giuong->id }}','giuong{{ $giuong->id }}')">
                    <div class="row g-0">
                        <div class="col-md-4 d-flex">
                            <img class="img-fluid rounded " style="object-fit: cover;" src="/client/images/{{ $giuong->hinh }}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title">{{ $giuong->ten }}</h4>
                                <p class="card-text">{{ $giuong->kichthuoc }}
                                    {{ $giuong->donvi }}
                                </p>
                                <p class="card-text"> <small class="text-muted">{{ $giuong->mieuTa }}</small>
                                </p>
                                @include('giuongs.edit')
                                @include('giuongs.delete')
                            </div>
                        </div>
                    </div>
                </div>
            </label>
        </div>
    @endforeach
    @error('giuongid')
        <div class="alert alert-danger" role="alert">{{ $message }}</div>
    @enderror
</div>
