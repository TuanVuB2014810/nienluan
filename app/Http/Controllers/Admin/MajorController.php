<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\Department;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Major::orderBy('id', 'DESC')->paginate(20);
        return view('admin.major.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats = Department::orderBy('id', 'ASC')->select('id', 'name')->get();
        return view('admin.major.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|max:100|unique:majors',
            'dep_id' => 'required|exists:departments,id'
        ], [
            'name.required' => 'Tên ngành không để trống'

        ]);

        $data = $request->only('name', 'dep_id');
        if(Major::create($data)) {
            return redirect()->route('major.index')->with('yes', 'Thêm mới thành công');
        }
        return redirect()->back()->with('no', 'Vui lòng kiểm tra đúng thông tin');
    }

    /**
     * Display the specified resource.
     */
    public function show(Major $major)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Major $major)
    {
        $departments = Department::orderBy('id', 'ASC')->select('id', 'name')->get();
        return view('admin.major.edit', compact('departments', 'major'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Major $major)
    {
        $request->validate([
            'name' => 'required|min:4|max:100|unique:majors,name,' . $major->id,
            'dep_id' => 'required|exists:departments,id'
        ], [
            'name.required' => 'Tên ngành không được để trống'
        ]);

        $data = $request->only('name', 'dep_id');
        if ($major->update($data)) {
            return redirect()->route('major.index')->with('yes', 'Cập nhật thành công');
        }
        return redirect()->back()->with('no', 'Vui lòng kiểm tra lại thông tin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Major $major)
    {
        if($major->delete()) {
            return redirect()->route('major.index')->with('yes', 'Đã xóa thành công');
        }
        return redirect()->back()->with('no', 'Vui lòng kiểm tra đúng thông tin');
    }
}
