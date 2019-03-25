<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::orderBy('created_at')->paginate(5);
        return response()->json($companies);
    }

    public function store(Request $request)
    {
        if($request->id){
            $company = Company::findOrFail($request->id);
            $company->update($request->only('name'));
        }else{
            $company = Company::create($request->only('name'));
        }
        return response()->json($company);
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return response()->json($company);
    }
}
