<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Major;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Account::orderBy('id', 'DESC')->paginate(20);
        return view('admin.account.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.account.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validator = $request->validate([
        'image' =>'file|mimes:jpg,jpeg,png,gif',
        'email' => 'required|email|unique:accounts',
        'password' => 'required|min:8|max:100',
        'role' => 'required',
        ]
    );
    $account = Account::create([
        'email' => $request->input('email'),
        'password' => ($request->input('password')),
        'role' => ($request->input('role')),
        'image' => '',
    ]);
    $imag_name = $request->image->hashName();
    $request->image->move(public_path('uploads'), $imag_name);
    $account->image = $imag_name;

    if($account->save()) {
        return redirect()->route('account.index')->with('yes', 'Đã thêm thành công');
    }
    return redirect()->back()->with('no', 'Vui lòng kiểm tra đúng thông tin');
}


    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        $cats = Major::orderBy('id', 'ASC')->select('id', 'name')->get();
        return view('admin.account.edit', compact('cats','account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        $request->validate([
            'image' =>'file|mimes:jpg,jpeg,png,gif',
            'email' => 'required|email|exists:accounts',
            'password' => 'required|min:8|max:100|',
            'role' => 'required',
        ]);

        if ($request->hasFile('image')) { // Sửa từ $request->has('image') thành $request->hasFile('image')
            $image = $request->file('image');
            $image_name = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $image_name);
            $account->image = $image_name;
        }
        
        if ($account->save()) {
            return redirect()->route('account.index')->with('success', 'Đã cập nhật thành công');
        }
        return redirect()->back()->with('error', 'Vui lòng kiểm tra đúng thông tin');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        if($account->delete()) {
            return redirect()->route('account.index')->with('yes', 'Đã xóa thành công');
        }
        return redirect()->back()->with('no', 'Vui lòng kiểm tra đúng thông tin');
    }
}
