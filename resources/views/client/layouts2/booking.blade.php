<form action="check">
    <div class="check-date">
        <label for="ngaydat">Check In:</label>
        <input type="date" class="form-control form-control-lg-border" id="ngaydat" name="ngaydat">
        @error('ngaydat')
        <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
    </div>
    <div class="check-date">
        <label for="ngaytra">Check Out:</label>
        <input type="date" class="form-control form-control-lg-border" id="ngaytra" name="ngaytra">
        @error('ngaytra')
        <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="soluong">Number Of People:</label>
        <input type="number" value=1 class="form-control form-control-lg border" id="soluong" name="soluong">
        @error('soluong')
        <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit">Check Availability</button>
</form>
