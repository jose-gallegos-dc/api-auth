<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Exception;

class EmployeeController extends Controller
{

    public function index(){

        $employees = Employee::all();

        return response()->json([
            "status" => true,
            "message" => "Employee List",
            "data" => $employees
        ], 200);
    }

    public function store(EmployeeRequest $request){

        try{
            $employee = Employee::create($request->all());

            return response()->json([
            "status" => true,
            "message" => "Employee created successfully.",
            "data" => $employee
            ], 201);
        }catch (Exception $e) {
           return response()->json([
            "status" => false,
            "message" => "Company not found",
            ], 404);
        }
    }

    public function show(Employee $employee){

        return response()->json([
            "success" => true,
            "message" => "Employee found.",
            "data" => $employee
        ], 200);
    }

    public function update(EmployeeRequest $request, Employee $employee ){

        try{
            $fields = $request->all();
            $employee->fill($fields)->save();
        
            return response()->json([
                "status" => true,
                "message" => "Employee updated successfully.",
                "data" => $employee
            ], 200);
        }catch (Exception $e) {
           return response()->json([
            "status" => false,
            "message" => "Company not found",
            ], 404);
        }
    }

    public function destroy(Employee $employee){

        $employee->delete();
        return response()->json([
            "status" => true,
            "message" => "Employee deleted successfully.",
            "data" => $employee
        ], 200);
    }

}