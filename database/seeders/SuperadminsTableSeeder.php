<?php

namespace Database\Seeders;

use App\Models\Superadmin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperadminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Superadmin::insert([
            'name' => 'Superadmin',
            'email' => 'superadmin@superadmin.com',
            'password' => Hash::make('Superadmin1234!'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
