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
                    <form action="{{ route('teacherr.store') }}" method="POST" role="form" enctype="multipart/form-data">
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
                        
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop()

