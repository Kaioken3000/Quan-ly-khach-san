<div class="mb-3">
    <label class="form-label" for="so_phong">Sô phòng</label>
    <input type="number" name="so_phong" class="form-control" id="so_phong" placeholder="VD: 001"
        @if (isset($phong)) value="{{ $phong->so_phong }}" @endif required />
    @error('so_phong')
        <div class="alert alert-danger" role="alert">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label class="form-label" for="loaiphongid">Loại phòng</label>
    <select class="form-control" id="loaiphongid" name="loaiphongid">
        @foreach ($loaiphongs as $loaiphong)
            <option value="{{ $loaiphong->ma }}"
                @if (isset($phong)) @if ($loaiphong->ma === $phong->loaiphongid)
                        selected @endif
                @endif
                >{{ $loaiphong->ten }}
            </option>
        @endforeach
    </select>
    @error('loaiphongid')
        <div class="alert alert-danger" role="alert">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label class="form-label" for="chinhanhid">Loại phòng</label>
    <select class="form-control" id="chinhanhid" name="chinhanhid">
        @foreach ($chinhanhs as $chinhanh)
            <option value="{{ $chinhanh->id }}"
                @if (isset($phong)) @if ($chinhanh->id === $phong->chinhanhid)
                        selected @endif
                @endif
                >{{ $chinhanh->ten }}
            </option>
        @endforeach
    </select>
    @error('chinhanhid')
        <div class="alert alert-danger" role="alert">{{ $message }}</div>
    @enderror
</div>
