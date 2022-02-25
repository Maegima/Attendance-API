<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
            'name' => 'User', 
            'email' => 'User', 
            'password' => Hash('sha256', 'password', false), 
            'cpf' => '12345678901'
        ]);
        Employee::create([
            'name' => 'Admin', 
            'email' => 'Admin', 
            'password' => Hash('sha256', 'password', false), 
            'cpf' => '12345678902',
            'type' => 2
        ]);
    }
}
