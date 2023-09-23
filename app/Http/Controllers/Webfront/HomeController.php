<?php

namespace App\Http\Controllers\Webfront;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Blog;
use App\Models\Link;

class HomeController extends Controller
{
    public function index(){
        $company = Company::first();
        $data = Blog::all();
        $link_jurnal = Link::where('menu', 'jurnal')->first();
        $link_katalog = Link::where('menu', 'katalog')->first();
        session(['link_jurnal' => $link_jurnal->link]);
        session(['link_katalog' => $link_katalog->link]);
        session(['config' => $company]);
        return view('webfront.home',compact('data','company'));
    }
}
