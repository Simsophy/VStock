<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use DB;
class CompanyController extends Controller
{
   public function index(){
    // $data['com']=Company::find(1);
    return view('admins.companies.index',['com'=>DB::table('companies')->find(1)]);
   }
   public function edit(){
      return view('admins.companies.edit',['com'=>DB::table('companies')->find(1)]);
   }
}
