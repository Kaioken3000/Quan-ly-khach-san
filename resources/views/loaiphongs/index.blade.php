@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Loại phòng /</span> Quản lý</h4>
  <!-- Create -->
  @hasrole('Admin')
  <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#ModalCreate">
    <i class="bx bx-plus mb-1"></i> Create Loại phòng
  </button>
  @endhasrole
  <!-- Modal Create -->
  <div class="modal fade" id="ModalCreate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Create Loại phòng</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('loaiphongs.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label" for="ma">Mã loại phòng</label>
              <input type="text" name="ma" class="form-control" id="ma" placeholder="VD: P1" require="require" />
              @error('ma')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="ten">Tên loại phòng</label>
              <input type="text" name="ten" class="form-control" id="ten" placeholder="VD: Phòng VIP" require="require" />
              @error('ten')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="gia">Giá loại phòng</label>
              <input type="number" name="gia" class="form-control" id="gia" min=0 require="require" />
              @error('gia')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="hinh">Hinh loại phòng</label>
              <input type="file" name="hinh" class="form-control" id="hinh" require="require" />
              @error('hinh')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="soluong">Số lượng</label>
              <input type="number" name="soluong" class="form-control" id="soluong" min=1 require="require" />
              @error('soluong')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="mieuTa">Miêu tả</label>
              <textarea id="mieuTa" name="mieuTa" class="form-control" placeholder="VD: Phòng đẹp, tiện nghi,.." require="require"></textarea>
              @error('mieuTa')
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
    <h5 class="card-header">Quản lý loại phòng</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr class="thead-dark">
            <th>Mã loại phòng</th>
            <th>Tên loại phòng</th>
            <th>Giá </th>
            <th>Hinh</th>
            <th>Số lượng</th>
            <th>Miêu tả loại phòng</th>
            @hasrole('Admin')
            <th width="280px">Action</th>
            @endhasrole
          </tr>
        </thead>
        <tbody>
          @foreach ($loaiphongs as $loaiphong)
          <tr>
            <td>{{ $loaiphong->ma }}</td>
            <td>{{ $loaiphong->ten }}</td>
            <td>{{ $loaiphong->gia }} VND</td>
            <td><img data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $loaiphong->hinh }}" src="/client/images/{{ $loaiphong->hinh }}" width="100%"></td>
            <td>{{ $loaiphong->soluong }}</td>
            <td>{{ $loaiphong->mieuTa }}</td>
            @hasrole('Admin')
            <td>
              <!-- edit -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalEdit{{ $loaiphong->ma }}">
                <i class="bx bx-edit mb-1"></i>
              </button>
              <!-- Modal edit -->
              <div class="modal fade" id="ModalEdit{{ $loaiphong->ma }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel1">Edit Loại phòng</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('loaiphongs.update',$loaiphong->ma) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                          <label class="form-label" for="ma">Mã loại phòng</label>
                          <input type="text" name="ma" class="form-control" value="{{ $loaiphong->ma }}" id="ma" placeholder="VD: P1" require="require" />
                          @error('ma')
                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="ten">Tên loại phòng</label>
                          <input type="text" name="ten" class="form-control" id="ten" value="{{ $loaiphong->ten }}" placeholder="VD: Phòng VIP" require="require" />
                          @error('ten')
                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="gia">Giá loại phòng</label>
                          <input type="number" name="gia" class="form-control" value="{{ $loaiphong->gia }}" id="gia" min=0 require="require" />
                          @error('gia')
                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="hinh">Hinh loại phòng</label>
                          <input type="file" name="hinh" class="form-control" id="hinh" require="require" />
                          @error('hinh')
                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="soluong">Số lượng</label>
                          <input type="number" name="soluong" class="form-control" id="soluong" min=1 value="{{ $loaiphong->soluong }}" require="require" />
                          @error('soluong')
                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="mieuTa">Miêu tả</label>
                          <textarea id="mieuTa" name="mieuTa" class="form-control" placeholder="VD: Phòng đẹp, tiện nghi,.." require="require">{{ $loaiphong->mieuTa }}</textarea>
                          @error('mieuTa')
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
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#basicModal{{ $loaiphong->ma }}">
                <i class="bx bx-trash mb-1"></i>
              </button>
              <!-- Modal xoá  -->
              <div class="modal fade" id="basicModal{{ $loaiphong->ma }}" tabindex="-1" aria-hidden="true">
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
                        <form action="{{ route('loaiphongs.destroy',$loaiphong->ma) }}" method="Post">
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
              {!! $loaiphongs->links("pagination::bootstrap-4") !!}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection