<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Validator;
use Session;

class CompanyController extends Controller
{
      public function index(){
        $companies =Company::all();

        return view('company.index',[
            'companies'=>$companies
        ]);
    }

    public function create(){
        return view('company.create');
    }

    public function store(Request $request){

     
        $validator=Validator::make($request->all(),[
            'company'=>'required | max: 20 | min: 1'
        ]);

        if($validator->fails()){
            return redirect('company/create')
            ->withInput()
            ->withErrors($validator);
        }
        
        $result=$request->file('myfile')->store('company');

        $company = new Company;
        $company->company_id=time();
        $company->company_name=$request->company;
        $company->logo=$result;
        $company->save();

        Session::flash('add_company','successfully added');
        return redirect('company/create');
    }
    
    
    
    
    
    
    
    // These method are for moblie api
    
    public function getCompany(){
        $companies =Company::all();
        return $companies;
    }
}
