<?php

namespace App\Http\Controllers\Webfront;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Team;

class ContactController extends Controller
{
    public function index(){
        $company = Company::first();
        $configuration = Company::first();
        session(['config' => $company]);
        return view('webfront.contact', compact('configuration'));
    }
}
