<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ServiceController extends Controller
{
    public function haki(){
        if(session('admin_data') == null){
            return redirect('/login');
        }
        $company = Company::first();
        $data = Service::where('menu', 'haki')->get();
       if(session('config') == null){
            return redirect('/login');
        }

        return view('admin.service', compact('data','company'));
    }
    public function penelitian(){
        if(session('admin_data') == null){
            return redirect('/login');
        }
        $company = Company::first();
        $data = Service::where('menu', 'penelitian')->get();
    if(session('config') == null){
            return redirect('/login');
        }

        return view('admin.service', compact('data','company'));
    
    }
    public function kolaborasi(){
        if(session('admin_data') == null){
            return redirect('/login');
        }
        $company = Company::first();
        $data = Service::where('menu', 'kolaborasi')->get();
        if(session('config') == null){
            return redirect('/login');
        }

        return view('admin.service', compact('data','company'));
    }
    public function pelatihan(){
        if(session('admin_data') == null){
            return redirect('/login');
        }
        $company = Company::first();
        $data = Service::where('menu', 'pelatihan')->get();
        if(session('config') == null){
            return redirect('/login');
        }

        return view('admin.service', compact('data','company'));
    }
    public function konversi(){
        if(session('admin_data') == null){
            return redirect('/login');
        }
        $company = Company::first();
        $data = Service::where('menu', 'konversi')->get();
        if(session('config') == null){
            return redirect('/login');
        }

        return view('admin.service', compact('data','company'));
    }
    public function editing(){
        if(session('admin_data') == null){
            return redirect('/login');
        }
        $company = Company::first();
        $data = Service::where('menu', 'editing')->get();
        if(session('config') == null){
            return redirect('/login');
        }

        return view('admin.service', compact('data','company'));
    }
    public function design(){
        if(session('admin_data') == null){
            return redirect('/login');
        }
        $company = Company::first();
        $data = Service::where('menu', 'design')->get();
        if(session('config') == null){
            return redirect('/login');
        }

        return view('admin.service', compact('data','company'));
    }
    public function layout(){
        if(session('admin_data') == null){
            return redirect('/login');
        }
        $company = Company::first();
        $data = Service::where('menu', 'layout')->get();
        if(session('config') == null){
            return redirect('/login');
        }

        return view('admin.service', compact('data','company'));
    }
    public function addService(Request $req)
    {
           if(session('config') == null){
            return redirect('/login');
        }
        $validator = Validator::make($req->all(), [
            'menu' => 'required',
            'title' => 'required',
            'subtitle' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,svg|max:2048',
        ]);
        // dd($req->all());
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with(['message' => $validator->errors()->first(), 'color' => 'alert-light-warning']);
        }else{

            $image = '';
            if ($req->hasfile('image')) {
                $imageName = time().'.'.$req->image->extension();
                $req->image->move(public_path('asset-user/service'), $imageName);
                $image = "asset-user/service/$imageName";
            }
            $hsl = Service::create([
                'menu' => $req->menu,
                'title' => $req->title,
                'subtitle' => $req->subtitle,
                'content' => $req->content,
                'image' => $image,
                'training_date' => $req->training_date,
            ]);
            if($hsl){
                return redirect()->back()->with(['message' => 'Berhasil Menambah Data', 'color' => 'alert-light-success']);
            }else{
                return redirect()->back()->with(['message' => 'Gagal Menambah Data', 'color' => 'alert-light-warning']);
            }
        }
    }
    public function editService(Request $req)
    {  
           if(session('config') == null){
            return redirect('/login');
        }
        $validator = Validator::make($req->all(), [
            'menu' => 'required',
            'title' => 'required',
            'subtitle' => 'required',
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
                $req->image->move(public_path('asset-user/service'), $imageName);
                $image = "asset-user/service/$imageName";
            }else{
                $image = $req->default;
            }
            $hsl = Service::where('id',$req->id)->update([
                'title' => $req->title,
                'subtitle' => $req->subtitle,
                'content' => $req->content,
                'image' => $image,
                'training_date' => $req->training_date,
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
        $hsl = Service::find($req->id);
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
        $get = Service::where('id', $request->id)->first();
        $hsl = unlink(public_path($get->image));
        if($hsl){
            Service::find($request->id)->delete();
            return redirect()->back()->with(['message' => 'Data Berhasil dihapus', 'color' => 'alert-success']);
        }else{
            return redirect()->back()->with(['message' => 'Data Gagal dihapus', 'color' => 'alert-danger']);
        }
    }
    public function upload(Request $request)
    {
           if(session('config') == null){
            return redirect('/login');
        }
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move(public_path('/upload/service'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('upload/service/' . $fileName);
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url')</script>";
            echo $response;
        }
    }
    public function uploadfile(Request $request)
    {
           if(session('config') == null){
            return redirect('/login');
        }
            $request->hasfile('image');
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('upload/service'), $imageName);
            return redirect()->back()->with(['message' => 'Data Berhasil di upload', 'color' => 'alert-success']);
    }
    public function file_browse(Request $req)
    {
      if(session('config') == null){
            return redirect('/login');
        }
        $r_path = $req->path;
        if (empty($r_path)) {
            $r_path = "upload/service";
        }
        $path = public_path('/' . $r_path);
        $files = scandir($path);
        return view('admin.file_browse', compact('files', 'r_path'));
    }
}
