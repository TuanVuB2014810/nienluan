@extends('master.admin')
@section('title', 'Sinh Viên')
@section('main')


<table id="stu-table" class="table table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th>Họ tên</th>
            <th>Khoa</th>
            <th>Tên Ngành</th>
            <th>Giới tính</th>
            <th>Ngày sinh</th>
            <th>Niên khóa</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $model)
        <tr>
            <td>{{$model->id }}</td>
            <!-- <td>
                @if ($model->image)
                    <img src="uploads/{{$model->image}}" alt="Hình ảnh" style="max-width: 100px; max-height: 100px;">
                @else
                    <span>Không có hình ảnh</span>
                @endif
            </td> -->
            <td>{{$model->name}}</td>
            <td>{{$model->major->cat->name}}</td>
            <td>{{$model->major->name}}</td>
            <td>{{$model->sex}}</td>
            <td>{{$model->birthday}}</td>
            <td>{{$model->course}}</td>
            <td class="text-right">
                <form action="{{route('student.destroy', $model->id)}}" method="post" >
                    @csrf @method('DELETE')
                    <a href="{{ route('student.edit', $model->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <button class=" btn-sm btn-danger " onclick="return confirm('Bạn có chắc xóa không ?')"><i class="fa fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@stop()

@section('scripts')
<script>

    $(document).ready(function () {
    $('#stu-table').DataTable({
       language: {
          "sProcessing": "Đang xử lý...",
          "sLengthMenu": "Hiển thị _MENU_ kết quả",
          "sZeroRecords": "Không tìm thấy kết quả nào",
          "sInfo": "Hiển thị _START_ đến _END_ của _TOTAL_ kết quả",
          "sInfoEmpty": "Hiển thị 0 đến 0 của 0 kết quả",
          "sInfoFiltered": "(được lọc từ _MAX_ kết quả)",
          "sInfoPostFix": "",
          "sSearch": "Tìm kiếm:",
          "sUrl": "",
          "oPaginate": {
          "sFirst": "Đầu",
          "sPrevious": "Trước",
          "sNext": "Tiếp",
          "sLast": "Cuối"
          }
       }
    });
 });
</script>

@stop()