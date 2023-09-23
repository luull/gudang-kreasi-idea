<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    public function index(){
        if(session('admin_data') == null){
            return redirect('/login');
        }
        $data = Product::all();
        $category = Category::all();
      if(session('config') == null){
            return redirect('/login');
        }

        return view('admin.product', compact('data','category'));
    }
    public function addProduct(Request $req)
    {
           if(session('config') == null){
            return redirect('/login');
        }
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'description' => 'required',
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
                $req->image->move(public_path('asset-user/product'), $imageName);
                $image = "asset-user/product/$imageName";
            }
            $slug = Str::slug($req->name);
            $hsl = Product::create([
                'name' => $req->name,
                'category_id' => $req->category_id,
                'price' => $req->price,
                'description' => $req->description,
                'image' => $image,
                'slug' => $slug,
            ]);
            if($hsl){
                return redirect()->back()->with(['message' => 'Berhasil Menambah Data', 'color' => 'alert-light-success']);
            }else{
                return redirect()->back()->with(['message' => 'Gagal Menambah Data', 'color' => 'alert-light-warning']);
            }
        }
    }
    public function editProduct(Request $req)
    {   
           if(session('config') == null){
            return redirect('/login');
        }
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'description' => 'required',
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
                $req->image->move(public_path('asset-user/product'), $imageName);
                $image = "asset-user/product/$imageName";
            }else{
                $image = $req->default;
            }
            $slug = Str::slug($req->name);
            $hsl = Product::where('id',$req->id)->update([
                'name' => $req->name,
                'category_id' => $req->category_id,
                'price' => $req->price,
                'description' => $req->description,
                'image' => $image,
                'slug' => $slug,
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
        $hsl = Product::find($req->id);
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
        $get = Product::where('id', $request->id)->first();
        $hsl = unlink(public_path($get->image));
        if($hsl){
            Product::find($request->id)->delete();
            return redirect()->back()->with(['message' => 'Data Berhasil dihapus', 'color' => 'alert-success']);
        }else{
            return redirect()->back()->with(['message' => 'Data Gagal dihapus', 'color' => 'alert-danger']);
        }
    }
}
