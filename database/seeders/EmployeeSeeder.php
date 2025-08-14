<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder {
    public function run(): void {
        DB::TABLE('employees')->insert([
            ['name' => 'John Doe', 'department' => 'IT', 'salary' => 50000],
            ['name' => 'Jane Smith', 'department' => 'HR', 'salary' => 45000],
            ['name' => 'Mike Johnson', 'department' => 'Finance', 'salary' => 60000],
        ]);
    }
}

