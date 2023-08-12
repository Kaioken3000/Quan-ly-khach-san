<div class="row m-2">
    <div>
        @include('thietbis.create')
    </div>
    @foreach ($thietbis as $thietbi)
        <div class="form-check col-4">
            <label class="form-check-label" for="thietbi{{ $thietbi->id }}">
                <div class="card form-check-label" style="max-width:32rem;"
                    onclick="changeBoder(this,'thietbi{{ $thietbi->id }}')">
                    <div class="row g-0">
                        <div class="col-md-4 d-flex">
                            <img class="img-fluid" style="object-fit: cover;" src="/client/images/{{ $thietbi->hinh }}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title">{{ $thietbi->ten }}</h4>
                                <p class="card-text">{{ $thietbi->gia }} VND</p>
                                <p class="card-text"> <small class="text-muted">{{ $thietbi->mieuTa }}</small>
                                </p>
                                @include('thietbis.edit')
                                @include('thietbis.delete')
                            </div>
                        </div>
                    </div>
                </div>
            </label>
        </div>
    @endforeach
    @error('thietbiid')
        <div class="alert alert-danger" role="alert">{{ $message }}</div>
    @enderror
</div>
