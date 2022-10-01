<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee = new Employee();
        $employee->name = "cristiano ronaldo";
        $employee->last_name = "dos santos aveiro";
        $employee->email = "cr7@gmail.com";
        $employee->phone = "9611234567";
        $employee->company_id = 2;
        $employee->save();

        $employee = new Employee();
        $employee->name = "lionel andrés";
        $employee->last_name = "messi cuccittini";
        $employee->email = "lm10@gmail.com";
        $employee->phone = "9617654321";
        $employee->company_id = 1;
        $employee->save();
    }
}
