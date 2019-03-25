<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        if($request->get('where')){
            $employees=Employee::where('company_id',$request->get('where'))->get();
        }else{
            $employees=Employee::all();
        }
        return response()->json($employees);
    }

    public function store(Request $request)
    {
        if($request->id){
            $employee = Employee::findOrFail($request->id);
            $employee->update($request->only('name','company_id'));
        }else{
            $employee = Employee::create($request->only('name','company_id'));
        }
        return response()->json($employee);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json($employee);
    }
}
