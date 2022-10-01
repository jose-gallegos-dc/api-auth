<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company =  new Company();
        $company->name = "lala";
        $company->email = "lala@gmail.com";
        $company->logo = "logo_lala.png";
        $company->save();

        $company =  new Company();
        $company->name = "pepsi";
        $company->email = "pepsi@gmail.com";
        $company->logo = "logo_pepsi.png";
        $company->save();
    }
}
