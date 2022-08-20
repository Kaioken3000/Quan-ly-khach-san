<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Loai phong</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('loaiphongs.create') }}"> Create loai phong</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <table class="table table-hover">
        <thead>
            <tr class="thead-dark">
                <th>Mã loại phòng</th>
                <th>Tên loại phòng</th>
                <th>Giá loại phòng</th>
                <th>Miêu tả loại phòng</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loaiphongs as $loaiphong)
            <tr>
                <td>{{ $loaiphong->ma }}</td>
                <td>{{ $loaiphong->ten }}</td>
                <td>{{ $loaiphong->gia }}</td>
                <td>{{ $loaiphong->mieuTa }}</td>
                <td>
                    <form action="{{ route('loaiphongs.destroy',$loaiphong->ma) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('loaiphongs.edit',$loaiphong->ma) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>