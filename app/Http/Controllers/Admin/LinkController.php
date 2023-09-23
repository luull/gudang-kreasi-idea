<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class LinkController extends Controller
{
    public function index(){
        if(session('admin_data') == null){
            return redirect('/login');
        }
        $data = Link::all();
    if(session('config') == null){
            return redirect('/login');
        }

        return view('admin.link', compact('data'));
    }
    public function addLink(Request $req)
    {
           if(session('config') == null){
            return redirect('/login');
        }
        $validator = Validator::make($req->all(), [
            'menu' => 'required',
            'link' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with(['message' => $validator->errors()->first(), 'color' => 'alert-light-warning']);
        }else{

            $hsl = Link::create([
                'menu' => $req->menu,
                'link' => $req->link,
            ]);
            if($hsl){
                return redirect()->back()->with(['message' => 'Berhasil Menambah Data', 'color' => 'alert-light-success']);
            }else{
                return redirect()->back()->with(['message' => 'Gagal Menambah Data', 'color' => 'alert-light-warning']);
            }
        }
    }
    public function editLink(Request $req)
    {   
           if(session('config') == null){
            return redirect('/login');
        }
        $validator = Validator::make($req->all(), [
            'menu' => 'required',
            // 'link' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with(['message' => $validator->errors()->first(), 'color' => 'alert-light-warning']);
        }else{
            $hsl = Link::where('id',$req->id)->update([
                'menu' => $req->menu,
                'link' => $req->link,
            ]);
            if($hsl){
                return redirect()->back()->with(['message' => 'Berhasil Mengubah Data', 'color' => 'alert-light-success']);
            }else{
                return redirect()->back()->with(['message' => 'Gagal Mengubah Data', 'color' => 'alert-light-warning']);
            }
        }
    }
      public function find(Request $req)
    {
           if(session('config') == null){
            return redirect('/login');
        }
        $hsl = Link::find($req->id);
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
        $hsl = Link::find($request->id)->delete();
        if($hsl){
            return redirect()->back()->with(['message' => 'Data Berhasil dihapus', 'color' => 'alert-light-success']);
        }else{
            return redirect()->back()->with(['message' => 'Data Gagal dihapus', 'color' => 'alert-light-danger']);
        }
    }
}
