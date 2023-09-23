<?php

namespace App\Http\Controllers\Auth;

use App\Models\Admin;
use App\Models\Company;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with(['message' => $validator->errors()->first(), 'color' => 'alert-light-warning']);
        }else{
            $check = Admin::where('username', $request->username)->first();
            if($check){
                if (Hash::check($request->password, $check->password)) {
                    session(['admin_data' => $check]);
                    $company = Company::first();
                    session(['config' => $company]);
                    return 
                    redirect('/admin/dashboard');
                }else{
                    return redirect()->back()->with(['message' => 'Password salah', 'color' => 'alert-light-warning']);
                }
            }else {
                return redirect()->back()->with(['message' => 'Username salah', 'color' => 'alert-light-warning']);
            }
        }
    }
    public function logout(Request $request)
    {
        if ($request->session()->has('admin_data')) {
            $request->session()->forget('admin_data');
        }
        return redirect('/login')->with(['message' => 'Berhasil keluar', 'color' => 'alert-light-light-success']);
    }
    public function changepass()
    {
        return view('auth.changepass');
    }
    public function proseschange(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required',
            'password1' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with(['message' => $validator->errors()->first(), 'color' => 'alert-light-warning']);
        }else{
        $old = $request->old_password;
        $pwd = $request->password;
        $pwd2 = $request->password1;
        $data = Admin::where('username', session('admin_data')->username)->first();
        $getid = Admin::where('username', session('admin_data')->username)->first()->id;
        if ($data) {
            if (Hash::check($old, $data->password )) {
                if (Hash::check($pwd, $data->password )) {
                    return redirect()->back()->with(['message' => 'Password sama', 'color' => 'alert-light-warning']);
                }elseif (Hash::check($pwd2, $data->password )) {
                    return redirect()->back()->with(['message' => 'Password sama', 'color' => 'alert-light-warning']);
                }else {
                    if($pwd != $pwd2){
                        return redirect()->back()->with(['message' => 'Password tidak sama', 'color' => 'alert-light-warning']);
                    }else {
                        $hsl = Admin::where('id', $getid)->update([
                            'password' => bcrypt($pwd)
                        ]);
                        if($hsl){
                            $request->session()->flush();
                            return redirect('/login')->with(['message' => 'Ubah Password berhasil', 'color' => 'alert-light-success']);
                        }
                    }
                }
            }else {
                return redirect()->back()->with(['message' => 'Password lama anda salah', 'color' => 'alert-light-danger']);
            }
        }
    }

    }
}

