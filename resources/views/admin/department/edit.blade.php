@extends('master.admin')
@section('title', 'Sửa Ngành')
@section('main')


<div class="container">
    <div class="row justify-content-center align-items-center" >
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Thông Tin</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
        
                    <form action="{{ route('department.update', $department) }}" method="POST" role="form">
                        @csrf @method('PUT')
                        
                            <div class="form-group">
                                <label for="">Tên ngành</label>
                                <input type="text" class="form-control" name="name" value= "{{$department->name}}" placeholder="Nhập tên ngành">
                                @error('name')
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