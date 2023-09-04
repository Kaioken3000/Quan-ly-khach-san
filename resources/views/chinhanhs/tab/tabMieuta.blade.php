<div>
    @include('mieutas.create')
</div>
<div class="row w-100">
    @foreach ($mieutas as $mieuta)
        <div class="col-4 form-check">
            <label class="form-check-label w-100" for="mieuta{{ $mieuta->id }}">
                <div class="card form-check-label" id="mieutaDetail{{ $mieuta->id }}" <?php
                if (isset($chinhanh)) {
                    foreach ($chinhanh->mieutachinhanhs as $mieutachinhanh) {
                        if ($mieuta->id === $mieutachinhanh->mieutaid) {
                            echo 'style="border: 3px black solid"';
                        }
                    }
                }
                ?>
                    onclick="changeBoder('mieutaDetail{{ $mieuta->id }}','mieuta{{ $mieuta->id }}')">
                    <div class="card-body">
                        {{-- <textarea cols="150" rows="10">{{ $mieuta->noidung }}</textarea> --}}
                        {!! $mieuta->noidung !!}
                        @include('mieutas.edit')
                        @include('mieutas.delete')
                    </div>
                </div>
            </label>
        </div>
    @endforeach
</div>
@error('mieutaid')
    <div class="alert alert-danger" role="alert">{{ $message }}</div>
@enderror
