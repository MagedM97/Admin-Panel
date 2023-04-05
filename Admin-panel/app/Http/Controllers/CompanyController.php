<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    function  companies_view(){

        $companies = Company::paginate(10);
            return view ('admin.companies', compact('companies'));
       }


/*
* CURD functions for companies
*/
       public function create()
       {  
          
           return view('admin/companies.create');

       }

       public function store(Request $request)
       {
           
           $request->validate(Company::$rules);
           
          
           $company = new Company;
           if ( $request->file('logo')){
            $logo = $request->file('logo')->store('logos', ['disk' => 'public']);
            $company['Logo'] = $logo;}
           $company->fill($request->post());
           $company['Name'] = $request['name'];
           $company['Website'] = $request['website'] ;
           $company['Email'] = $request['email'] ;
           
   
           $company->save();
           return redirect()->route('companies')->with('message', 'Company added successfully');
       }

       public function edit($id)
       {
           
           $company = Company::findOrFail($id);
  
           return view('admin/companies.edit')->with([
               'company'=>$company,
              
       ]);
       }

       public function update(Request $request, $id)
       {
           $company = Company::findOrFail($id);
   
           
           $request->validate(Company::$rules);
           $company->fill($request->post());
   if ( $request->file('logo')){
           $logo = $request->file('logo')->store('logos', ['disk' => 'public']);
           $company['Logo'] = $logo;}
           $company['Name'] = $request['name'];
           $company['Website'] = $request['website'] ;
           $company['Email'] = $request['email'] ;
           
   
           $company->save();
           return redirect()->route('companies')->with('message', 'Company updated successfully');
       }


       public function delete($id)
       {
           
           Company::destroy($id);
           return redirect()->route('companies')->with('alert', 'Company deleted successfully');
       }
}
