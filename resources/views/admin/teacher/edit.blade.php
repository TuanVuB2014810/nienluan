@extends('master.admin')
@section('title', 'Cập Nhật Giảng Viên')
@section('main')


<div class="container">
    <div class="row justify-content-center align-items-center" >
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Cập Nhật Thông Tin</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="{{ route('teacher.update', $teacher) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf @method('PUT')
                        <div class="form-group">
                            <label for="">Họ tên</label>
                            <input type="text" class="form-control" name="name" value= "{{$teacher->name}}" placeholder="Nhập tên ngành">
                            @error('name')
                                <small class="help-block text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Tên Khoa</label>
                            <select name="dep_id" class="form-control">
                                <option value="">--Chọn khoa--</option>
                                @foreach ($cats as $cat)
                                <option value="{{$cat->id}}" {{$cat->id == $teacher->dep_id ? 'selected' : ''}}>{{$cat->name}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Ngày sinh</label>
                            <input type="date" class="form-control" value= "{{$teacher->birthday}}" name="birthday">
                            @error('birthday')
                                <small class="help-block text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Giới tính</label>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="sex" id="male" value="Nam" {{$teacher->sex == 'Nam' ? 'checked' : ''}}>
                                <label class="form-check-label" for="male">
                                    Nam
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sex" id="female" value="Nữ" {{$teacher->sex == 'Nữ' ? 'checked' : ''}}>
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
                            <input type="text" class="form-control" name="civil_servants" value= "{{$teacher->civil_servants}}" placeholder="Nhập ngạch viên chức">
                            @error('civil_servants')
                                <small class="help-block text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Trình độ chuyên môn</label>
                            <input type="text" class="form-control" name="qualification" value= "{{$teacher->qualification}}"  placeholder="Nhập trình độ">
                            @error('qualification')
                                <small class="help-block text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary"><i class="fa fa-save">Lưu</i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@stop()