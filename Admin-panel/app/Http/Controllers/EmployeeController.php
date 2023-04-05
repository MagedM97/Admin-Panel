<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    function  employees_view(){
    
        $employees = Employee::paginate(10);
            return view ('admin.employees', compact('employees'));
       }

/*
* CURD functions for companies
*/
       public function create()
    {
        $companies = Company::all();
       
        return view('admin/employees.create')->with([
            'companies' => $companies,
        ]);


    }

    public function store(Request $request)
    {
        
        $request->validate(Employee::$rules);

       
        $employee = new Employee;

        $employee->fill($request->post());
        $employee['First Name'] = $request['first_name'];
        $employee['Last Name'] = $request['last_name'] ;
        $employee['Email'] = $request['email'] ;
        $employee['Phone'] = $request['phone'] ;
        $employee['Company'] = $request['company'] ;
       

        $employee->save();
        return redirect()->route('employees')->with('message', 'Employee added successfully');
    }

    public function edit($id)
    {
        
        $employee = Employee::findOrFail($id);
        $companies=Company::all();
        return view('admin/employees.edit')->with([
            'employee'=>$employee,
            'companies'=>$companies
           
    ]);
    }



    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        
        $request->validate(Employee::$rules);
        $employee->fill($request->post());

        $employee['First Name'] = $request['first_name'];
        $employee['Last Name'] = $request['last_name'] ;
        $employee['Email'] = $request['email'] ;
        $employee['Phone'] = $request['phone'] ;
        $employee['Company'] = $request['company'] ;

        $employee->save();
        return redirect()->route('employees')->with('message', 'Employee updated successfully');
    }



    public function delete($id)
    {
        
        Employee::destroy($id);
        return redirect()->route('employees')->with('alert', 'Employee deleted successfully');
    }
}
