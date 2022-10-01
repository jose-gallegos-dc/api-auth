<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
 
    public function authorize()
    {
        return true;
    }

  
    public function rules()
    {
        return [
            'email' => ($this->getMethod() == 'POST') ? 'required|email|unique:companies' : 'required|email|unique:companies,email,'.$this->company->id,
            'name' => 'required|max:255',
            'logo' => 'required',
            'website' => 'nullable'
        ];
    }
}
