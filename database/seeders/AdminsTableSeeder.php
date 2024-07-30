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
            'givenName' => 'Cora',
            'middleName' => 'Estenzo',
            'lastName' => 'Lim',
            'email' => 'coralim@admin.com',
            'cpNumber' => '09123456789',
            'birthday' => '1960-06-27',
            'sex' => 'Female',
            'civilStat' => 'Married',
            'address' => 'Marrieta Tower',
            'password' => Hash::make('Cora1234!')
        ]);
    }
}
