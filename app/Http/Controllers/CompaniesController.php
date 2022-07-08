<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Validator;

class CompaniesController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies.index', compact('companies'));
    }

    public function create(){
        return view('companies.create');
    }

    public function store(Request $request){
        $request->validate([
            'company_name' => 'required|string|unique:companies,name|max:50|min:3',
            'email' => 'required|email|unique:companies,email|max:50|min:3',
            'logo' => 'required|image'
        ]);
        $new_company = new Company;
        $new_company->name = $request->company_name;
        $new_company->email = $request->email;
        if($request->hasFile('logo')){
            $file_name = time();
            $uploaded_file = $request->file('logo')->storeAs('logo', $file_name ,'public');
            $new_company->logo = 'logo/'.$file_name;
        }
        $new_company->save();
        return redirect()->route('companies');
    }

    public function edit(Company $company){
        return view('companies.edit', compact('company'));
    }

    public function update(Company $company, Request $request){
        $request->validate([
            'company_name' => 'required|string|unique:companies,name,'.$company->id.'|max:50|min:3',
            'email' => 'required|email|unique:companies,name,'.$company->id.'|max:50|min:3',
            'logo' => 'image'
        ]);
        $company->name = $request->company_name;
        if($request->hasFile('logo')){
            $file_name = time();
            $uploaded_file = $request->file('logo')->storeAs('logo', $file_name ,'public');
            $company->logo = 'logo/'.$file_name;
        }
        $company->save();
        return redirect()->route('companies');
    }

    public function destroy(Company $company){
        $company->delete();
        return redirect()->route('companies');
    }

    public function all_companies(){
        $companies = Company::get();
        return \Response::json(compact('companies'));
    }
}
