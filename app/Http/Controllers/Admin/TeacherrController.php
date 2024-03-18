<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacherr;
use App\Models\Department;
use Illuminate\Http\Request;

class TeacherrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Teacherr::orderBy('id', 'DESC')->paginate(20);

        return view('admin.teacherr.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats = Department::orderBy('id', 'ASC')->select('id', 'name')->get();
        return view('admin.teacherr.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validator = $request->validate([
            'name' => 'required|min:4|max:100',
            'dep_id' => 'required|exists:departments,id',
        ]);
    
        // Create a new teacherr instance
        $teacherr = Teacherr::create([
            'name' => $request->input('name'),
            'dep_id' => $request->input('dep_id'),
            // 'image' => '',
        ]);
    
        // Save the teacherr record
        if ($teacherr->save()) {
            return redirect()->route('teacherr.index')->with('yes', 'Đã thêm thành công');
        } else {
            return redirect()->back()->with('no', 'Đã xảy ra lỗi. Vui lòng thử lại.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacherr $teacherr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacherr $teacherr)
    {
        $cats = Department::orderBy('id', 'ASC')->select('id', 'name')->get();
        return view('admin.teacherr.edit', compact('cats','teacherr'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacherr $teacherr)
    {
        $validator = $request->validate([
            'name' => 'required|min:4|max:100',
            'dep_id' => 'required|exists:departments,id',
        ]);
        $teacherr->name = $request->input('name');
        $teacherr->dep_id = $request->input('dep_id');
        if ($teacherr->save()) {
            return redirect()->route('teacherr.index')->with('success', 'Đã cập nhật thành công');
        }
        return redirect()->back()->with('error', 'Vui lòng kiểm tra đúng thông tin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacherr $teacherr)
    {
        if($teacherr->delete()) {
            return redirect()->route('teacherr.index')->with('yes', 'Đã xóa thành công');
        }
        return redirect()->back()->with('no', 'Vui lòng kiểm tra đúng thông tin');
    }
}
