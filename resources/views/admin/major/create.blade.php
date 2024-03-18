@extends('master.admin')
@section('title', 'Thêm Ngành')
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
        
                    <form action="{{ route('major.store') }}" method="POST" role="form">
                    @csrf
                        <legend>Form title</legend>
                    
                        <div class="form-group">
                            <label for="">Tên Khoa</label>
                            <select name="dep_id" class="form-control">
                                <option value="">--Chọn khoa--</option>
                                @foreach ($cats as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Tên ngành</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên ngành">
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