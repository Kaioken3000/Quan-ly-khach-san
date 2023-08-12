<div class="mb-3">
    <label class="form-label" for="so_phong">Sô phòng</label>
    <input type="number" name="so_phong" class="form-control" id="so_phong" placeholder="VD: 001" required/>
    @error('so_phong')
        <div class="alert alert-danger" role="alert">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label class="form-label" for="loaiphongid">Loại phòng</label>
    <select class="form-control" id="loaiphongid" name="loaiphongid">
        @foreach ($loaiphongs as $loaiphong)
            <option value="{{ $loaiphong->ma }}">{{ $loaiphong->ten }}</option>
        @endforeach
    </select>
    @error('loaiphongid')
        <div class="alert alert-danger" role="alert">{{ $message }}</div>
    @enderror
</div>
