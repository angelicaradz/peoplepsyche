<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::insert([
            'givenName' => 'Admin',
            'lastName' => 'Test',
            'email' => 'angelica.ramirez192001@gmail.com',
            'cpNumber' => '09123456789',
            'birthday' => '2024-08-20',
            'sex' => 'Female',
            'civilStat' => 'Single',
            'address' => 'PeoplePsyche',
            'password' => Hash::make('Admin1234!'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Admin::insert([
            'givenName' => 'Cora',
            'middleName' => 'Estenzo',
            'lastName' => 'Lim',
            'email' => 'cora.lim@g.msuiit.edu.ph',
            'cpNumber' => '09177110980',
            'birthday' => '1960-06-27',
            'sex' => 'Female',
            'civilStat' => 'Married',
            'address' => 'Marrieta Tower',
            'password' => Hash::make('Cora1234!'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
