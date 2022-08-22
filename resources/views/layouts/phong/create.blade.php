<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Phong Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add Phòng</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('phongs.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('phongs.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Số phòng:</strong>
                        <input type="number" name="so_phong" class="form-control" placeholder="Số phòng">
                        @error('so_phong')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Hình phòng:</strong>
                        <input type="file" name="hinh" class="form-control">
                        @error('hinh')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Loại phòng:</strong>
                        <select data-placeholder="Select Loại Phòng" class="chosen-select" name="loaiphongid" id="loaiphongid">
                            @foreach ($loaiphongs as $loaiphong)
                                <option value="{{ $loaiphong->ma }}">{{ $loaiphong->ten }}</option>
                            @endforeach
                        </select>
                        @error('loaiphongid')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>