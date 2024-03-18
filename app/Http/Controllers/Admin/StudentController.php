<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use DB;
use Session;
use App\Models\Student;
use App\Models\Major;
use Illuminate\Http\Request;
session_start();
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lấy danh sách sinh viên theo thứ tự giảm dần của ID
        $data = Student::orderBy('id', 'DESC')->paginate(20);
    
        // Trả về view 'admin.student.index' với dữ liệu sinh viên đã được cập nhật
        return view('admin.student.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $majors = Major::orderBy('id', 'ASC')->select('id', 'name')->get();
        return view('admin.student.create', compact('majors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|min:4|max:100',
            'major_id' => 'required|exists:majors,id',
            'birthday' => 'required|date',
            'sex' => 'required',
            'course' => 'required',
            
        ], [
            'name.required' => 'Hãy nhập họ tên',
            'name.min' => 'Họ tên có ít nhất 4 ký tự',
            'major_id' => 'Hãy chọn ngành học',
            'birthday' => 'Hãy chọn ngày sinh',
            // 'phone' =>'Hãy nhập số điện thoại',
            // 'password.required' =>'Hãy nhập mật khẩu',
            // 'password.min' => 'Mật khẩu có ít nhất 8 ký tự',
            // 'email.required' => 'Hãy nhập email',
            // 'email.email' => 'Hãy nhập đúng định dạnh email',
            // 'email.unique' => 'Email đã tồn tại',
        ]);
    
        // Tạo đối tượng student
        $student = Student::create([
            'name' => $request->input('name'),
            'major_id' => $request->input('major_id'),
            'sex' => $request->input('sex'),
            'birthday' => $request->input('birthday'),
            'course' => $request->input('course'),
            // 'image' => '',
        ]);
        // $imag_name = $request->image->hashName();
        // $request->image->move(public_path('uploads'), $imag_name);
        // $student->image = $imag_name;
    
        if($student->save()) {
            return redirect()->route('student.index')->with('yes', 'Đã thêm thành công');
        }
        return redirect()->back()->with('no', 'Vui lòng kiểm tra đúng thông tin');
    
    }


    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(student $student)
    {
        $majors = Major::orderBy('id', 'ASC')->select('id', 'name')->get();
        return view('admin.student.edit', compact('majors','student'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validator = $request->validate([
            'name' => 'required|min:4|max:100',
            'major_id' => 'required|exists:majors,id',
            'birthday' => 'required|date',
            'sex' => 'required',
            'course' => 'required',
            // 'phone' => 'required',
            // 'image' =>'file|mimes:jpg,jpeg,png,gif',
            // 'password' => 'nullable|min:8|max:100',
        ], [
            'name.required' => 'Hãy nhập họ tên',
            'name.min' => 'Họ tên có ít nhất 4 ký tự',
            'major_id.required' => 'Hãy chọn ngành học',
            'birthday.required' => 'Hãy chọn ngày sinh',
            // 'phone.required' =>'Hãy nhập số điện thoại',
            // 'password.min' => 'Mật khẩu có ít nhất 8 ký tự',
            // 'email.required' => 'Hãy nhập email',
            // 'email.email' => 'Hãy nhập đúng định dạnh email',
            // 'email.unique' => 'Email đã tồn tại',
        ]);


        $student->name = $request->input('name');
        $student->major_id = $request->input('major_id');
        // $student->email = $request->input('email');
        $student->birthday = $request->input('birthday');
        $student->sex = $request->input('sex');
        $student->course= $request->input('course');


        // if ($request->hasFile('image')) { // Sửa từ $request->has('image') thành $request->hasFile('image')
        //     $image = $request->file('image');
        //     $image_name = time() . '_' . $image->getClientOriginalName();
        //     $image->move(public_path('uploads'), $image_name);
        //     $student->image = $image_name;
        // }
        
        if ($student->save()) {
            return redirect()->route('student.index')->with('success', 'Đã cập nhật thành công');
        }
        return redirect()->back()->with('error', 'Vui lòng kiểm tra đúng thông tin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        if($student->delete()) {
            return redirect()->route('student.index')->with('yes', 'Đã xóa thành công');
        }
        return redirect()->back()->with('no', 'Vui lòng kiểm tra đúng thông tin');
    }
}

