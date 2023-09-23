<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\MenuBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class BlogController extends Controller
{
    public function index(){
        if(session('admin_data') == null){
            return redirect('/login');
        }
        $data = Blog::all();
        $menu = MenuBlog::all();
    if(session('config') == null){
            return redirect('/login');
        }

        return view('admin.blog', compact('data','menu'));
    }
    public function addBlog(Request $req)
    {
           if(session('config') == null){
            return redirect('/login');
        }
        $validator = Validator::make($req->all(), [
            'menu' => 'required',
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,svg|max:2048',
        ]);
            
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with(['message' => $validator->errors()->first(), 'color' => 'alert-light-warning']);
        }else{

            $image = '';
            if ($req->hasfile('image')) {
                $imageName = time().'.'.$req->image->extension();
                $req->image->move(public_path('asset-user/blog'), $imageName);
                $image = "asset-user/blog/$imageName";
            }
            $hsl = Blog::create([
                'menu' => $req->menu,
                'title' => $req->title,
                'publisher' => session('admin_data')->username,
                'content' => $req->content,
                'image' => $image,
            ]);
            if($hsl){
                return redirect()->back()->with(['message' => 'Berhasil Menambah Data', 'color' => 'alert-light-success']);
            }else{
                return redirect()->back()->with(['message' => 'Gagal Menambah Data', 'color' => 'alert-light-warning']);
            }
        }
    }
    public function editBlog(Request $req)
    {  
           if(session('config') == null){
            return redirect('/login');
        }
        $validator = Validator::make($req->all(), [
            'menu' => 'required',
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,svg|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with(['message' => $validator->errors()->first(), 'color' => 'alert-light-warning']);
        }else{
            $image = '';
            if ($req->hasfile('image')) {
                $imageName = time().'.'.$req->image->extension();
                $req->image->move(public_path('asset-user/blog'), $imageName);
                $image = "asset-user/blog/$imageName";
            }else{
                $image = $req->default;
            }
            $hsl = Blog::where('id',$req->id)->update([
                'title' => $req->title,
                'content' => $req->content,
                'image' => $image,
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
        $hsl = Blog::find($req->id);
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
        $get = Blog::where('id', $request->id)->first();
        $hsl = unlink(public_path($get->image));
        if($hsl){
            Blog::find($request->id)->delete();
            return redirect()->back()->with(['message' => 'Data Berhasil dihapus', 'color' => 'alert-success']);
        }else{
            return redirect()->back()->with(['message' => 'Data Gagal dihapus', 'color' => 'alert-danger']);
        }
    }
}
