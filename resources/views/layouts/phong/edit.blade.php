<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Loại phòng Form </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Loại phòng</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('phongs.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('phongs.update',$phong->so_phong) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Số phòng:</strong>
                        <input type="number" name="so_phong" class="form-control" placeholder="Số phòng" value="{{ $phong->so_phong }}">
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
                                @if($loaiphong->ma === $phong->loaiphongid)
                                    <option value="{{ $loaiphong->ma }}" selected>{{ $loaiphong->ten }}</option>
                                @else 
                                    <option value="{{ $loaiphong->ma }}">{{ $loaiphong->ten }}</option>
                                @endif
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