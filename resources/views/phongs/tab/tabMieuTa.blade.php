<div>
    @include('mieutas.create')
</div>
@foreach ($mieutas as $mieuta)
    <div class="form-check">
        <label class="form-check-label" for="mieuta{{ $mieuta->id }}"
            onclick="changeBoder(this,'mieuta{{ $mieuta->id }}')">
            <div class="card form-check-label">
                <div class="card-body">
                    {{-- <textarea cols="150" rows="10">{{ $mieuta->noidung }}</textarea> --}}
                    <p>{{ $mieuta->noidung }}</p>
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

