@extends('master.admin')
@section('title', 'Quản Lý Khoa')
@section('main')

<table id="dep-table" class="table table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên Khoa</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $model)
        <tr>
            <td>{{$loop->index +1 }}</td>
            <td>{{$model->name}}</td>
            
            <td class="text-right">
                <form action="{{route('department.destroy', $model->id)}}" method="post" >
                    @csrf @method('DELETE')
                    <a href="{{ route('department.edit', $model->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <button class=" btn-sm btn-danger" onclick="return confirm('Bạn có chắc xóa không ?')"><i class="fa fa-trash"></i></button>
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
    $('#dep-table').DataTable({
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
