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
                    <a class="btn btn-primary" href="{{ route('loaiphongs.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('loaiphongs.update',$loaiphong->ma) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Mã loại phòng:</strong>
                        <input type="text" name="ma" class="form-control" value="{{ $loaiphong->ma }}" placeholder="ma loại phòng">
                        @error('ma')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tên loại phòng:</strong>
                        <input type="text" name="ten" class="form-control" value="{{ $loaiphong->ten }}" placeholder="Tên loại phòng">
                        @error('ten')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Giá loại phòng:</strong>
                        <input type="number" name="gia" class="form-control" value="{{ $loaiphong->gia }}" placeholder="Giá loại phòng">
                        @error('gia')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Miêu tả:</strong>
                        <textarea type="text" name="mieuTa" class="form-control">{{ $loaiphong->mieuTa }}</textarea>
                        @error('mieuTa')
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