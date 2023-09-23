<?php

namespace App\Http\Controllers\Webfront;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Team;

class TeamsController extends Controller
{
    public function index(){
        $company = Company::first();
        $data = Team::all();
        session(['config' => $company]);
        return view('webfront.team', compact('data'));
    }
}
