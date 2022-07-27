<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function profile()
    {
        return view('admin.profile');
    }
    public function show_staffs()
    {
        $staffs = User::where('role', '=', 'user')->paginate(1);
        return view('admin.tables.staff_table', compact('staffs'));
    }
    public function edit_staff($id)
    {
        $staff = User::find($id);
        return view('admin.forms.edit_staffs', compact('staff'));
    }

    public function edit_staff_post(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,'.$request->id,
                // 'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($request->id)],
            ],
            []
        );

        $staff = User::find($request->id);
        $staff->name = $request->name;
        $staff->email = $request->email;
        // if(empty($request->role)){
        // $staff->role = 'user';
        // }
        // else{
        //     $staff->role = $request->role;
        // }
        $staff->save();

        return redirect()->route('show_staffs');
    }
    
    public function reset_pass($id)
    {
        $staff = User::find($id);
        $staff->password = Hash::make('user1234');
        $staff->save();
        $msg = 'The Password Been Reset';
        return redirect()->route('show_staffs',compact('msg'));
    }

    public function delete_staff($id)
    {
        $staff = User::find($id);
        $staff->delete();
        return redirect()->route('show_staffs');
    }
}
