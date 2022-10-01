<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    // Relación uno a uno
    public function employee(){
        return $this->hasOne('App\Model\Employee');
    }

    protected $fillable = [
        'name', 'email', 'logo', 'website'
    ];
}
