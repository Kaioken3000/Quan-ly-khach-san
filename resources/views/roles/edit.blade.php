@extends('layouts3.app')

@section('content')
    <br>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('roles.index') }}"><i class="bx bx-chevron-left mb-1"></i> Back</a>
    </div>
    <h4 class="fw-bold py-3"><span class="text-muted fw-light">Role/</span> Edit</h4>
    @if (session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif
    <!-- Basic Layout -->
    <h5 class="mb-0">From nhập liệu</h5>
    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label" for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="VD: Admin"
                value="{{ $role->name }}" />
            @error('name')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="loaiphongid">Permission:</label>
            @foreach ($permission as $value)
                <div class="form-check">
                    <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name form-check-input']) }}
                        {{ $value->name }}
                    </label>
                </div>
            @endforeach
            @error('permission')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Xác nhận</button>
    </form>
@endsection
