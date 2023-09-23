<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\MenuBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ConfigurationController extends Controller
{
    public function index(){
        if(session('admin_data') == null){
            return redirect('/login');
        }
        $data = Company::first();
   if(session('config') == null){
            return redirect('/login');
        }

        return view('admin.configuration', compact('data'));
    }
    public function editConfig(Request $req)
    {
           if(session('config') == null){
            return redirect('/login');
        }
        // dd($req->all());
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'title_header' => 'required',
            'subtitle_header' => 'required',
            'company_about' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'ig' => 'required',
            'fb' => 'required',
            'twitter' => 'required',
            'shopee' => 'required',
            'tokped' => 'required',
            'link_address' => 'required',
            'logo' => 'image|mimes:jpg,png,jpeg,svg|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with(['message' => $validator->errors()->first(), 'color' => 'alert-light-warning']);
        }else{
            $image = '';
            if ($req->hasfile('logo')) {
                $imageName = time().'.'.$req->logo->extension();
                $req->logo->move(public_path('asset-user/config'), $imageName);
                $image = "asset-user/config/$imageName";
            }else{
                $image = $req->default;
            }
            $hsl = Company::where('id',$req->id)->update([
                'title_header' => $req->title_header,
                'subtitle_header' => $req->subtitle_header,
                'name' => $req->name,
                'company_about' => $req->company_about,
                'phone' => $req->phone,
                'email' => $req->email,
                'address' => $req->address,
                'link_address' => $req->link_address,
                'ig' => $req->ig,
                'fb' => $req->fb,
                'twitter' => $req->twitter,
                'shopee' => $req->shopee,
                'tokped' => $req->tokped,
                'logo' => $image,
            ]);
            if($hsl){
                $company = Company::first();
                session(['config' => $company]);
                return redirect()->back()->with(['message' => 'Berhasil Mengubah Data', 'color' => 'alert-light-success']);
            }else{
                return redirect()->back()->with(['message' => 'Gagal Mengubah Data', 'color' => 'alert-light-warning']);
            }
        }
    }
}