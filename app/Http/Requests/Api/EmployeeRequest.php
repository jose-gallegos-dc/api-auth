<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'email' => ($this->getMethod() == 'POST') ? 'required|email|unique:employees' : 'required|email|unique:employees,email,'.$this->employee->id,
            'phone' => ($this->getMethod() == 'POST') ? 'required|unique:employees' : 'required|unique:employees,phone,'.$this->employee->id,
            'company_id' => ($this->getMethod() == 'POST') ? 'required|unique:employees' : 'required|unique:employees,company_id,'.$this->employee->id,
            'name' => 'required|max:255',
            'last_name' => 'required|max:255'
        ];
    }
}
