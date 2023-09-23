<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    public function index(){
        if(session('admin_data') == null){
            return redirect('/login');
        }
        if(session('admin_data')->level != 1){
            return redirect('/login');
        }
        $data = Admin::all();
        if(session('config') == null){
            return redirect('/login');
        }

        return view('admin.admin', compact('data'));
    }   
    public function addAdmin(Request $request)
    {
        if(session('config') == null){
            return redirect('/login');
        }
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with(['message' => $validator->errors()->first(), 'color' => 'alert-light-warning']);
        }else{
            $get = Admin::where('username', $request->username)->first();
            if($get){
                return redirect()->back()->with(['message' => 'Nama sudah terdaftar', 'color' => 'alert-light-warning']);
            }else {
                $hsl = Admin::create([
                    'username' => $request->username,
                    'password' => bcrypt($request->password),
                ]);
            }
            if($hsl){
                return redirect()->back()->with(['message' => 'Data Berhasil ditambah', 'color' => 'alert-light-success']);
            }else{
                return redirect()->back()->with(['message' => 'Data Gagal ditambah', 'color' => 'alert-light-danger']);
            }
        }
    }

    public function editAdmin(Request $request)
    {
           if(session('config') == null){
            return redirect('/login');
        }
        $validator = Validator::make($request->all(), [
            'username' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with(['message' => $validator->errors()->first(), 'color' => 'alert-light-warning']);
        }else{
                    $hsl = Admin::find($request->id)->update([
                        'username' => $request->username,
                    ]);
                if($hsl){
                    return redirect()->back()->with(['message' => 'Data Berhasil diubah', 'color' => 'alert-light-success']);
                }else{
                    return redirect()->back()->with(['message' => 'Data Gagal diubah', 'color' => 'alert-light-danger']);
                }
        }
    }
    public function find(Request $req)
    {
           if(session('config') == null){
            return redirect('/login');
        }
        $hsl = Admin::find($req->id);
        if ($hsl) {
            return response()->json($hsl);
        } else {
            return response()->json(['message' => 'Data tidak ditemukan', 'error' => true]);
        }
    }
    public function delete(Request $request)
    {
           if(session('config') == null){
            return redirect('/login');
        }
        $hsl = Admin::find($request->id)->delete();
        if($hsl){
            return redirect()->back()->with(['message' => 'Data Berhasil dihapus', 'color' => 'alert-light-success']);
        }else{
            return redirect()->back()->with(['message' => 'Data Gagal dihapus', 'color' => 'alert-light-danger']);
        }
    }
}