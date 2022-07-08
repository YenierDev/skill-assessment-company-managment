<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;
use Illuminate\Support\Facades\Validator;

class EmployeesController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $employees = Employee::paginate(10);
        return view('employees.index', compact('employees'));
    }

    public function create(){
        $companies = Company::get();
        return view('employees.create', compact('companies'));
    }

    public function store(Request $request){
        $request->validate([
            'first_name' => 'required|string|max:50|min:3',
            'last_name' => 'required|string|max:50|min:3',
            'email' => 'required|email|unique:companies,name|max:50|min:3',
            'phone' => 'required|digits_between:3,20',
            'company' => 'required'
        ]);
        $new_employee = new Employee;
        $new_employee->first_name = $request->first_name;
        $new_employee->last_name = $request->last_name;
        $new_employee->email = $request->email;
        $new_employee->phone = $request->phone;
        $new_employee->company_id = $request->company;
        $new_employee->save();
        return redirect()->route('employees');
    }

    public function edit(Employee $employee){
        $companies = Company::get();
        return view('employees.edit', compact('employee', 'companies'));
    }

    public function update(Employee $employee, Request $request){
        $request->validate([
            'first_name' => 'required|string|max:50|min:3',
            'last_name' => 'required|string|max:50|min:3',
            'email' => 'required|email|unique:companies,name,'.$employee->id.'|max:50|min:3',
            'phone' => 'required|digits_between:3,20',
            'company' => 'required'
        ]);
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->company_id = $request->company;
        $employee->save();
        return redirect()->route('employees');
    }

    public function destroy(Employee $employee){
        $employee->delete();
        return redirect()->route('employees');
    }

    public function all_employees(){
        $employees = Company::get();
        return \Response::json(compact('employees'));
    }
}
