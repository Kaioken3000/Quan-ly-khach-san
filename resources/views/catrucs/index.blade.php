@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Ca trực /</span> Quản lý</h4>
  <!-- Create -->
  @hasrole('Admin')
  <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#ModalCreate">
    <i class="bx bx-plus mb-1"></i> Create Ca trực
  </button>
  @endhasrole
  <!-- Modal Create -->
  <div class="modal fade" id="ModalCreate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Create Ca trực</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('catrucs.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label" for="ten">Tên ca trực</label>
              <input type="text" name="ten" class="form-control" id="ten" placeholder="VD: ăn uống" require="require" />
              @error('ten')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="giobatdau">Giờ bắt đầu</label>
              <input type="time" name="giobatdau" class="form-control" id="giobatdau" min=0 require="require" />
              @error('giobatdau')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="gioketthuc">Giờ kết thúc</label>
              <input type="time" name="gioketthuc" class="form-control" id="gioketthuc" placeholder="VD: VNĐ" require="require" value="VND"/>
              @error('gioketthuc')
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
    <h5 class="card-header">Quản lý ca trực</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr class="thead-dark">
            <th>ID</th>
            <th>Tên ca trực</th>
            <th>Giờ bắt đầu </th>
            <th>Giờ kết thúc </th>
            @hasrole('Admin')
            <th width="280px">Action</th>
            @endhasrole
          </tr>
        </thead>
        <tbody>
          @foreach ($catrucs as $catruc)
          <tr>
            <td>{{ $catruc->id }}</td>
            <td>{{ $catruc->ten }}</td>
            <td>{{ $catruc->giobatdau }}</td>
            <td>{{ $catruc->gioketthuc }}</td>
            @hasrole('Admin')
            <td>
              <!-- edit -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalEdit{{ $catruc->id }}">
                <i class="bx bx-edit mb-1"></i>
              </button>
              <!-- Modal edit -->
              <div class="modal fade" id="ModalEdit{{ $catruc->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel1">Edit Ca trực</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('catrucs.update',$catruc->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                          <label class="form-label" for="ten">Tên ca trực</label>
                          <input type="text" name="ten" class="form-control" id="ten" value="{{ $catruc->ten }}" placeholder="VD: ăn uống" require="require" />
                          @error('ten')
                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="giobatdau">Giờ bắt đầu</label>
                          <input type="time" name="giobatdau" class="form-control" value="{{ $catruc->giobatdau }}" id="giobatdau" min=0 require="require" />
                          @error('giobatdau')
                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="gioketthuc">Giờ kết thúc</label>
                          <input type="time" name="gioketthuc" class="form-control" id="gioketthuc" value="{{ $catruc->gioketthuc }}" placeholder="VD: VND" require="require" />
                          @error('gioketthuc')
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
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#basicModal{{ $catruc->id }}">
                <i class="bx bx-trash mb-1"></i>
              </button>
              <!-- Modal xoá  -->
              <div class="modal fade" id="basicModal{{ $catruc->id }}" tabindex="-1" aria-hidden="true">
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
                        <form action="{{ route('catrucs.destroy',$catruc->id) }}" method="Post">
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
            @endhasrole
          </tr>
          @endforeach
          <tr>
            <td>
              {!! $catrucs->links("pagination::bootstrap-4") !!}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection