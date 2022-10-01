<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    // Relación uno a uno
    public function company(){
        return $this->belongsTo('App\Models\Company');
    }

    protected $fillable = [
        'name', 'last_name', 'email', 'phone', 'company_id'
    ];
}
