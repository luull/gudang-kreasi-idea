<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        if(session('admin_data') == null){
            return redirect('/login');
        }
   if(session('config') == null){
            return redirect('/login');
        }
        return view('admin.dashboard');
    }
}
