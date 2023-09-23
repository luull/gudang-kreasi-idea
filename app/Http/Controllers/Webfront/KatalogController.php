<?php

namespace App\Http\Controllers\Webfront;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Company;
use App\Models\Category;
use App\Models\Product;

class KatalogController extends Controller
{
    public function index(){
        $company = Company::first();
        $data = Product::all();
        $banner = Banner::all();
        $category = Category::all();
        session(['config' => $company]);
        return view('webfront.katalog',compact('data','banner','category'));
    }
    public function detailProduk(Request $req){
        $company = Company::first();
        $product = Product::where('slug', $req->slug)->first();
        // dd($req->slug);
        session(['config' => $company]);
        return view('webfront.detail_katalog',compact('product','company'));
    }
    public function detailCategory(Request $req){
        $company = Company::first();
        $category = Category::where('slug', $req->slug)->first();
        // dd($req->slug);
        $product = Product::where('category_id', $category->id)->get();
        // dd($product);
        session(['config' => $company]);
        return view('webfront.detail_category',compact('category','company','product'));
    }
}
