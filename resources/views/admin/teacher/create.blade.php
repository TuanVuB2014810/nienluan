<!-- resources/views/accounts/create.blade.php -->

@extends('master.admin')
@section('title', 'Thêm Giảng viên')
@section('main')
<div class="container">
    <div class="row justify-content-center align-items-center" >
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Thông tin giảng viên</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="{{ route('teacher.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                        </div>
                        <div class="form-group">
                            <label for="">Họ tên</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập họ tên" ">
                            @error('name')
                                <small class="help-block text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="">Tên Khoa</label>
                            <select name="dep_id" class="form-control">
                                <option value="">--Chọn Khoa--</option>
                                @foreach ($cats as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                            @error('dep_id')
                                <small class="help-block text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        
                        <!-- <div class="form-group">
                            <label for="">Hình ảnh</label>
                            <input type="file" class="form-control" name="image">
                            @error('image')
                                <small class="help-block text-danger">{{ $message }}</small>
                            @enderror
                        </div> --> 
                        <div class="form-group">
                            <label for="">Ngày sinh</label>
                            <input type="date" class="form-control" name="birthday">
                            @error('birthday')
                                <small class="help-block text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Giới tính</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sex" id="male" value="nam">
                                <label class="form-check-label" for="male">
                                    Nam
                                </label>
                            
                                <input class="form-check-input" type="radio" name="sex" id="female" value="nữ">
                                <label class="form-check-label" for="female">
                                    Nữ
                                </label>
                            </div>
                            @error('sex')
                                <small class="help-block text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Ngạch viên chức</label>
                            <input type="text" class="form-control" name="civil_servants" placeholder="Nhập số điện thoại">
                            @error('civil_servants')
                                <small class="help-block text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Trình độ chuyên môn</label>
                            <input type="text" class="form-control" name="qualification" placeholder="Nhập mật khẩu">
                            @error('qualification')
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

