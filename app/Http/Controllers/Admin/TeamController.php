<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TeamController extends Controller
{
    public function index(){
        if(session('admin_data') == null){
            return redirect('/login');
        }
        $data = Team::all();
    if(session('config') == null){
            return redirect('/login');
        }

        return view('admin.team', compact('data'));
    }
    public function addTeam(Request $req)
    {
           if(session('config') == null){
            return redirect('/login');
        }
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'job' => 'required',
            'description' => 'required',
            'education' => 'required',
            'experience' => 'required',
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
                $req->image->move(public_path('asset-user/team'), $imageName);
                $image = "asset-user/team/$imageName";
            }
            $hsl = Team::create([
                'name' => $req->name,
                'job' => $req->job,
                'description' => $req->description,
                'education' => $req->education,
                'experience' => $req->experience,
                'image' => $image,
            ]);
            if($hsl){
                return redirect()->back()->with(['message' => 'Berhasil Menambah Data', 'color' => 'alert-light-success']);
            }else{
                return redirect()->back()->with(['message' => 'Gagal Menambah Data', 'color' => 'alert-light-warning']);
            }
        }
    }
    public function editTeam(Request $req)
    {   
           if(session('config') == null){
            return redirect('/login');
        }
        // dd($req->all());
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'job' => 'required',
            'description' => 'required',
            'education' => 'required',
            'experience' => 'required',
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
                $req->image->move(public_path('asset-user/team'), $imageName);
                $image = "asset-user/team/$imageName";
            }else{
                $image = $req->default;
            }
            $hsl = Team::where('id',$req->id)->update([
                'name' => $req->name,
                'job' => $req->job,
                'description' => $req->description,
                'education' => $req->education,
                'experience' => $req->experience,
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
        $hsl = Team::find($req->id);
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
        $get = Team::where('id', $request->id)->first();
        $hsl = unlink(public_path($get->image));
        if($hsl){
            Team::find($request->id)->delete();
            return redirect()->back()->with(['message' => 'Data Berhasil dihapus', 'color' => 'alert-success']);
        }else{
            return redirect()->back()->with(['message' => 'Data Gagal dihapus', 'color' => 'alert-danger']);
        }
    }
}
