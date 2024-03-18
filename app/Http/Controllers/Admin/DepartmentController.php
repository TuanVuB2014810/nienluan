<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Department::orderBy('id', 'DESC')->paginate(20);
        return view('admin.department.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|max:100|unique:departments'
        ], [
            'name.required' => 'Tên ngành không để trống'

        ]);

        $data = $request->only('name');
        if(Department::create($data)) {
            return redirect()->route('department.index')->with('yes', 'Thêm mới thành công');
        }
        return redirect()->back()->with('no', 'Vui lòng kiểm tra đúng thông tin');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('admin.department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required|min:4|max:100|unique:departments,name,'.$department->id
        ], [
            'name.required' => 'Tên ngành không để trống'

        ]);

        $data = $request->only('name');
        if($department->update($data)) {
            return redirect()->route('department.index')->with('yes', 'Cập nhật thành công');
        }
        return redirect()->back()->with('no', 'Vui lòng kiểm tra đúng thông tin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        if($department->delete()) {
            return redirect()->route('department.index')->with('yes', 'Đã xóa thành công');
        }
        return redirect()->back()->with('no', 'Vui lòng kiểm tra đúng thông tin');
    }
}
