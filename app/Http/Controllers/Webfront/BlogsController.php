<?php

namespace App\Http\Controllers\Webfront;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Company;
use App\Models\Blog;

class BlogsController extends Controller
{
    public function index(Request $req){
        $company = Company::first();
        $data = Blog::all();
        $dosen = Blog::where('menu', $req->menu)->get();
        session(['config' => $company]);
        // dd($data);
        return view('webfront.blog',compact('data','dosen'));
    }
    public function detailBlogs(Request $req){
        $company = Company::first();
        session(['config' => $company]);
        $blog = Blog::where('id', $req->id)->first();
        // dd($req->id);
        return view('webfront.detail_blog',compact('blog'));
    }
}
