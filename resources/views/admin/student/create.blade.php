<!-- resources/views/accounts/create.blade.php -->

@extends('master.admin')
@section('title', 'Thêm Sinh Viên')
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
                <form action="{{ route('student.store') }}" method="POST" role="form" enctype="multipart/form-data">
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
                            <label for="">Tên ngành</label>
                            <select name="major_id" class="form-control">
                                <option value="">--Chọn ngành--</option>
                                @foreach ( $majors as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                            @error('major_id')
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
                            <label for="">Niên khóa</label>
                            <input type="text" class="form-control" name="course" placeholder="Nhập niên khóa">
                            @error('course')
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

