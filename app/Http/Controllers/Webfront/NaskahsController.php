<?php

namespace App\Http\Controllers\Webfront;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Naskah;

class NaskahsController extends Controller
{
    public function index(){
        $company = Company::first();
        $data = Naskah::all();
        session(['config' => $company]);
        return view('webfront.naskah',compact('data'));
    }
}