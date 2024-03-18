<!-- resources/views/accounts/create.blade.php -->

@extends('master.admin')
@section('title', 'Thêm Ngành')
@section('main')

<div class="container">
    <div class="row justify-content-center align-items-center" >
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Thông tin sinh viên</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <form action="{{ route('account.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email" value="{{ old('email') }}">
                            @error('email')
                                <small class="help-block text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu">
                            @error('password')
                                <small class="help-block text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Hình ảnh</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @error('image')
                                <small class="help-block text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Quyền</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" id="user" value="0" checked>
                                <label class="form-check-label" for="user">
                                    Sinh viên
                                </label>

                                <input class="form-check-input" type="radio" name="role" id="teacher" value="1">
                                <label class="form-check-label" for="teacher">
                                    Giảng viên
                                </label>
                            </div>
                            @error('role')
                                <small class="help-block text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@stop()
