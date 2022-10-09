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

        $company = new Company($request->input());
        // Modifica el registro del campo logo en la DB
        $company->logo = $logoName = time()."_". $request->file('logo')->getClientOriginalName();
        // Mueve la imagen cargada de temporal a la carpeta pública
        $request->file('logo')->move(public_path("logos"), $logoName);
        $company->save();

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

      $company->fill($request->all());

      if($request->file('logo')){
         $company->logo = $logoName = time()."_". $request->file('logo')->getClientOriginalName();
         $request->file('logo')->move(public_path("logos"), $logoName);
         // Elimina la imagen antigua de la compañía asociada
         unlink(public_path("logos/". $request->input('logo_old')));
      }

      $company->save();
    
      return response()->json([
         "status" => true,
         "message" => "Company updated successfully.",
         "data" => $company
      ], 200);
    }

    public function destroy(Request $request, Company $company){

      unlink(public_path("logos/". $request->input('logo_old')));
      $company->delete();

        return response()->json([
            "status" => true,
            "message" => "Company deleted successfully.",
            "data" => $company
        ], 200);
    }

}