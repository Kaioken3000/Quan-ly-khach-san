<div>
    @include('mieutas.create')
</div>
@foreach ($mieutas as $mieuta)
    <div class="form-check">
        <label class="form-check-label" for="mieuta{{ $mieuta->id }}">
            <div class="card form-check-label" <?php
            if (isset($phong)) {
                foreach ($phong->mieutaphongs as $mieutaphong) {
                    if ($mieuta->id === $mieutaphong->mieutaid) {
                        echo 'style="border: 3px black solid"';
                    }
                }
            }
            ?> id="mieutaDetail{{ $mieuta->id }}"
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
@error('mieutaid')
    <div class="alert alert-danger" role="alert">{{ $message }}</div>
@enderror
