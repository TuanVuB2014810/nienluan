@extends('master.admin')
@section('title', 'Sửa Ngành')
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
                <form action="{{ route('account.update', $account) }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf @method('PUT')
                
                    </div>
                    <div class="form-group">
                        <label for="">email</label>
                        <input type="email" class="form-control" name="email" value= "{{$account->email}}"  placeholder="Nhập tên ngành">
                    </div>

                    <div class="form-group">
                        <label for="">Mật khẩu</label>
                        <input type="text" class="form-control" name="password" value= "{{$account->password}}" placeholder="Nhập tên ngành">
                    </div>
                    <div class="form-group">
                        <label for="">Hình Ảnh</label>
                        <input type="file" class="form-control-file"name="image">
                        @if($account->image)
                            <img src="uploads/{{$account->image}}" alt="Hình ảnh đang sử dụng" style="max-width: 200px;">
                        @endif
                    </div>
                    <div class="form-group">
                            <label>Giới tính</label>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="user" value="0" {{$account->role == '0' ? 'checked' : ''}}>
                                <label class="form-check-label" for="user">
                                    Sinh viên
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" id="teacher" value="1" {{$account->role == '1' ? 'checked' : ''}}>
                                <label class="form-check-label" for="teacher">
                                    Giảng viên
                                </label>
                            </div>
                            @error('role')
                                <small class="help-block text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save">Lưu</i></button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop()