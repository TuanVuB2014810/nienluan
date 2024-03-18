@extends('master.admin')
@section('title', 'Cập Nhật Sinh Viên')
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
                    <form action="{{ route('student.update', $student) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf @method('PUT')
                        <div class="form-group">
                            <label for="">Họ tên</label>
                            <input type="text" class="form-control" name="name" value= "{{$student->name}}" placeholder="Nhập tên ngành">
                            @error('name')
                                <small class="help-block text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Tên ngành</label>
                            <select name="major_id" class="form-control">
                                <option value="">--Chọn ngành--</option>
                                @foreach ( $majors as $cat)
                                <option value="{{$cat->id}}" {{$cat->id == $student->major_id ? 'selected' : ''}}>{{$cat->name}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" value= "{{$student->email}}"  placeholder="Nhập tên ngành">
                        </div> -->
                        <!-- <div class="form-group">
                            <label for="">Hình Ảnh</label>
                            <input type="file" class="form-control-file"name="image">
                            @if($student->image)
                                <img src="uploads/{{$student->image}}" alt="Hình ảnh đang sử dụng" style="max-width: 200px;">
                            @endif
                        </div> -->
                        <div class="form-group">
                            <label for="">Ngày sinh</label>
                            <input type="date" class="form-control" name="birthday" value= "{{$student->birthday}}">
                        </div>
                        <div class="form-group">
                            <label>Giới tính</label>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="sex" id="male" value="Nam" {{$student->sex == 'Nam' ? 'checked' : ''}}>
                                <label class="form-check-label" for="male">
                                    Nam
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sex" id="female" value="Nữ" {{$student->sex == 'Nữ' ? 'checked' : ''}}>
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
                            <input type="text" class="form-control" name="course" value= "{{$student->course}}" placeholder="Nhập niên khóa">
                            @error('course')
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