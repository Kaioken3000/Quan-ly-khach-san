@extends('layouts2.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Ca trực /</span> Quản lý</h4>
  <!-- Create -->
  <button type="button" class="btn btn-success mb-4" toggle="modal" target="#ModalCreate">
    <i class="bx bx-plus mb-1"></i> Create Ca trực
  </button>
  <!-- Modal Create -->
  <div class="modal fade" id="ModalCreate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Create Ca trực</h5>
          <button type="button" class="btn-close" dismiss="modal" aria-label="Close"></button>
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
              <label class="form-label" for="giatien">Giá ca trực</label>
              <input type="number" name="giatien" class="form-control" id="giatien" min=0 require="require" />
              @error('giatien')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="donvi">Đơn vị</label>
              <input type="text" name="donvi" class="form-control" id="donvi" placeholder="VD: VNĐ" require="require" value="VND"/>
              @error('donvi')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" dismiss="modal">
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
  <div class="card-box  pb-10">
        <div class="h5 pd-20 mb-0">Quản lý ca trực</div>
        <table class="data-table table nowrap">
        <thead>
          <tr >
            <th>ID</th>
            <th>Tên ca trực</th>
            <th>Giá </th>
            <th class="datatable-nosort">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($catrucs as $catruc)
          <tr>
            <td>{{ $catruc->id }}</td>
            <td>{{ $catruc->ten }}</td>
            <td>{{ $catruc->giatien }} {{ $catruc->donvi }}</td>
            <td>
              <!-- edit -->
              <button type="button" class="btn btn-primary" toggle="modal" target="#ModalEdit{{ $catruc->id }}">
                <i class="bx bx-edit mb-1"></i>
              </button>
              <!-- Modal edit -->
              <div class="modal fade" id="ModalEdit{{ $catruc->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel1">Edit Ca trực</h5>
                      <button type="button" class="btn-close" dismiss="modal" aria-label="Close"></button>
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
                          <label class="form-label" for="giatien">Giá ca trực</label>
                          <input type="number" name="giatien" class="form-control" value="{{ $catruc->giatien }}" id="giatien" min=0 require="require" />
                          @error('giatien')
                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="donvi">Đơn vị</label>
                          <input type="text" name="donvi" class="form-control" id="donvi" value="{{ $catruc->donvi }}" placeholder="VD: VND" require="require" />
                          @error('donvi')
                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
                          @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" dismiss="modal">
                        Cancel
                      </button>
                      <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>

              <!-- Delete-->
              <button type="button" class="btn btn-danger" toggle="modal" target="#basicModal{{ $catruc->id }}">
                <i class="bx bx-trash mb-1"></i>
              </button>
              <!-- Modal xoá  -->
              <div class="modal fade" id="basicModal{{ $catruc->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel1"> Bạn có chắc chắn muốn xoá</h5>
                      <button type="button" class="btn-close" dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="d-flex gap-1">
                        <button type="button" class="btn btn-outline-secondary" dismiss="modal">
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
@endsection