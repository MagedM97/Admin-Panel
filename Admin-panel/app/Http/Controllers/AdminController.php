<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin_view()
    {
        
        return view("admin.admin_dashboard");
    
    }
    

  
}
