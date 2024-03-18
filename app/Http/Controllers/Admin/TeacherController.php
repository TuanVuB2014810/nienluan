<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\Department;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Teacher::orderBy('id', 'DESC')->paginate(20);

        return view('admin.teacher.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats = Department::orderBy('id', 'ASC')->select('id', 'name')->get();
        return view('admin.teacher.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validator = $request->validate([
        'name' => 'required|min:4|max:100',
        'dep_id' => 'required|exists:departments,id',
        'birthday' => 'required|date',
        'sex' => 'required',
        // 'image' =>'file|mimes:jpg,jpeg,png,gif',
        'civil_servants' => 'required',
        'qualification' => 'required',
    ], [
        'name.required' => 'Hãy nhập họ tên',
        'name.min' => 'Họ tên có ít nhất 4 ký tự',
        'dep_id' => 'Hãy chọn khoa',
        'birthday' => 'Hãy chọn ngày sinh',
        // 'phone' =>'Hãy nhập số điện thoại',
        // 'password.required' =>'Hãy nhập mật khẩu',
        // 'password.min' => 'Mật khẩu có ít nhất 8 ký tự',
        // 'email.required' => 'Hãy nhập email',
        // 'email.email' => 'Hãy nhập đúng định dạnh email',
        // 'email.unique' => 'Email đã tồn tại',
    ]);

    // $latestTeacher = Teacher::latest()->first();
    // $nextIdNumber = $latestTeacher ? (int)($latestTeacher->id + 1) : 0;
    // $teacherId = str_pad($nextIdNumber, 5, '0', STR_PAD_LEFT);

    // Tạo đối tượng teacher
    $teacher = Teacher::create([
        'name' => $request->input('name'),
        'dep_id' => $request->input('dep_id'),
        'birthday' => $request->input('birthday'),
        'sex' => $request->input('sex'),
        'civil_servants' => $request->input('civil_servants'),
        'qualification' => $request->input('qualification'),
        // 'image' => '',
    ]);
    // $imag_name = $request->image->hashName();
    // $request->image->move(public_path('uploads'), $imag_name);
    // $teacher->image = $imag_name;

    if($teacher->save()) {
        return redirect()->route('teacher.index')->with('yes', 'Đã thêm thành công');
    }
    return redirect()->back()->with('no', 'Vui lòng kiểm tra đúng thông tin');
}

    

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        $cats = Department::orderBy('id', 'ASC')->select('id', 'name')->get();
        return view('admin.teacher.edit', compact('cats','teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $validator = $request->validate([
            'name' => 'required|min:4|max:100',
            'dep_id' => 'required|exists:departments,id',
            'birthday' => 'required|date',
            'sex' => 'required',
            // 'image' =>'file|mimes:jpg,jpeg,png,gif',
            'civil_servants' => 'required',
            'qualification' => 'required',
        ], [
            'name.required' => 'Hãy nhập họ tên',
            'name.min' => 'Họ tên có ít nhất 4 ký tự',
            'dep_id' => 'Hãy chọn khoa',
            'birthday' => 'Hãy chọn ngày sinh',
            // 'phone' =>'Hãy nhập số điện thoại',
            // 'password.required' =>'Hãy nhập mật khẩu',
            // 'password.min' => 'Mật khẩu có ít nhất 8 ký tự',
            // 'email.required' => 'Hãy nhập email',
            // 'email.email' => 'Hãy nhập đúng định dạnh email',
            // 'email.unique' => 'Email đã tồn tại',
        ]);

        // Update fields
        $teacher->name = $request->input('name');
        $teacher->dep_id = $request->input('dep_id');
        $teacher->sex = $request->input('sex');
        $teacher->birthday = $request->input('birthday');
        $teacher->civil_servants = $request->input('civil_servants');
        $teacher->qualification = $request->input('qualification');


        // if ($request->hasFile('image')) { // Sửa từ $request->has('image') thành $request->hasFile('image')
        //     $image = $request->file('image');
        //     $image_name = time() . '_' . $image->getClientOriginalName();
        //     $image->move(public_path('uploads'), $image_name);
        //     $teacher->image = $image_name;
        // }
        
        if ($teacher->save()) {
            return redirect()->route('teacher.index')->with('success', 'Đã cập nhật thành công');
        }
        return redirect()->back()->with('error', 'Vui lòng kiểm tra đúng thông tin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        if($teacher->delete()) {
            return redirect()->route('teacher.index')->with('yes', 'Đã xóa thành công');
        }
        return redirect()->back()->with('no', 'Vui lòng kiểm tra đúng thông tin');
    }
}

