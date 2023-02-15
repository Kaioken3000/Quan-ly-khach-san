@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Phòng /</span> Quản lý</h4>
  <!-- Create -->
  <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#ModalCreate">
    <i class="bx bx-plus mb-1"></i> Create Phòng
  </button>
  <!-- Modal Create -->
  <div class="modal fade" id="ModalCreate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Create phòng</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('phongs.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label" for="so_phong">Sô phòng</label>
              <input type="number" name="so_phong" class="form-control" id="so_phong" placeholder="VD: 001" />
              @error('so_phong')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="loaiphongid">Loại phòng</label>
              <select class="form-select" id="loaiphongid" name="loaiphongid">
                @foreach ($loaiphongs as $loaiphong)
                <option value="{{ $loaiphong->ma }}">{{ $loaiphong->ten }}</option>
                @endforeach
              </select>
              @error('loaiphongid')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Cancel
          </button>
          <button type="submit" class="btn btn-primary">Xác nhận</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif
  <div class="card">
    <h5 class="card-header">Quản lý phòng</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr class="thead-dark">
            <th>Số phòng</th>
            <th>Loại phòng</th>
            <th width="280px">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($phongs as $phong)
          <tr>
            <td>{{ $phong->so_phong }}</td>
            <!-- @foreach($loaiphongs as $loaiphong)
              @if($loaiphong->ma == $phong->loaiphongid)
              <td>{{ $loaiphong->ten }}</td>
              @endif
              @endforeach -->
            <td>{{ $phong->loaiphongs->ten }}</td>
            <td>
              <!-- edit --> 
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalEdit{{ $phong->so_phong }}">
                <i class="bx bx-edit mb-1"></i>
              </button>
              <!-- Modal edit -->
              <div class="modal fade" id="ModalEdit{{ $phong->so_phong }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel1">Edit Phòng</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('phongs.update',$phong->so_phong) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                          <label class="form-label" for="so_phong">Sô phòng</label>
                          <input type="number" name="so_phong" class="form-control" id="so_phong" value="{{ $phong->so_phong }}" placeholder="VD: 001" />
                          @error('so_phong')
                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="loaiphongid">Loại phòng</label>
                          <select class="form-select" id="loaiphongid" name="loaiphongid">
                            @foreach ($loaiphongs as $loaiphong)
                            <option value="{{ $loaiphong->ma }}" @if($loaiphong->ma === $phong->loaiphongid)
                              selected
                              @endif
                              >{{ $loaiphong->ten }}</option>
                            @endforeach
                          </select>
                          @error('loaiphongid')
                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
                          @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Cancel
                      </button>
                      <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- Delete-->
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalXoa{{ $phong->so_phong }}">
                <i class="bx bx-trash mb-1"></i>
              </button>
              <!-- Modal xoá  -->
              <div class="modal fade" id="ModalXoa{{ $phong->so_phong }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel1"> Bạn có chắc chắn muốn xoá</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="d-flex gap-1">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                          No
                        </button>
                        <form action="{{ route('phongs.destroy',$phong->so_phong) }}" method="Post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger"> Yes</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
          <tr>
            <td>
              {!! $phongs->links("pagination::bootstrap-4") !!}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection