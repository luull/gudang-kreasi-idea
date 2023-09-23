<?php

namespace App\Http\Controllers\Webfront;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Company;
use App\Models\Service;

class ServicesController extends Controller
{
    public function index(Request $req){
        $company = Company::first();
        $data = Service::where('menu', $req->menu)->first();
        session(['config' => $company]);
        return view('webfront.service',compact('data'));
    }
}
