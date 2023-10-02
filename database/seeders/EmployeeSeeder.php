<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = ['Андрей','Сергей', 'Михаил','Стас','Артем', 'Татьяна','Евгений','Катя','Борис'];
        foreach ($employees as $employee) {
            Employee::updateOrCreate(
                [
                    'name'      => $employee,
                ]
            );
        }
    }
}
