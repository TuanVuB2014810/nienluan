@extends('master.admin')
@section('title', 'Giảng Viên')
@section('main')


<table id="teacher-table" class="table table-hover">
    <thead>
        <tr>
            <th>Mã cán bộ</th>
            <th>Họ tên</th>
            <th>Khoa</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $model)
        <tr>
            <td>{{$model->id}}</td>
            <td>{{$model->name}}</td>
            <!-- <td>
                @if ($model->image)
                    <img src="uploads/{{$model->image}}" alt="Hình ảnh" style="max-width: 100px; max-height: 100px;">
                @else
                    <span>Không có hình ảnh</span>
                @endif
            </td> -->
            <td>{{$model->cat->name}}</td>
            <td class="text-right">
            <form action="{{ route('teacherr.destroy', $model->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{ route('teacherr.edit', $model->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"><i class="fa fa-trash"></i></button>
            </form>
</td>
        @endforeach
    </tbody>
</table>

@stop()

