<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\Api\CompanyRequest;

class CompanyController extends Controller
{

    public function index(){
        
        $companies = Company::all();
        
        return response()->json([
            "status" => true,
            "message" => "Company List",
            "data" => $companies
        ], 200);
    }

    public function store(CompanyRequest $request){

        $company = Company::create($request->all());
        
        return response()->json([
            "status" => true,
            "message" => "Company created successfully.",
            "data" => $company
        ], 201);
    }

    public function show(Company $company){

        return response()->json([
            "success" => true,
            "message" => "Company found.",
            "data" => $company
        ], 200);
    }

    public function update(CompanyRequest $request, Company $company){

        $fields = $request->all();
        $company->fill($fields)->save();
        
        return response()->json([
            "status" => true,
            "message" => "Company updated successfully.",
            "data" => $company
        ], 200);
    }

    public function destroy(Company $company){

        $company->delete();
        return response()->json([
            "status" => true,
            "message" => "Company deleted successfully.",
            "data" => $company
        ], 200);
    }

}