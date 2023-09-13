<form action="check">
    <div class="check-date">
        <label for="ngaydat">Ngày vào:</label>
        {{-- <input type="date" class="form-control form-control-lg-border" id="ngaydat" name="ngaydat"> --}}
        <input class="form-control datetimepicker" type="text" placeholder="yyyy-mm-dd" name="ngaydat" />
        @error('ngaydat')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
    </div>
    <div class="check-date">
        <label for="ngaytra">Ngày ra:</label>
        {{-- <input type="date" class="form-control form-control-lg-border" id="ngaytra" name="ngaytra"> --}}
        <input class="form-control datetimepicker" type="text" placeholder="yyyy-mm-dd" name="ngaytra" />
        @error('ngaytra')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="soluong">Số người ở tối đa trong phòng:</label>
        <input type="number" value=1 class="form-control form-control-lg border" id="soluong" name="soluong">
        @error('soluong')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit">Kiểm tra</button>
</form>
