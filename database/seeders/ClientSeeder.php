<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            'givenName' => 'Wonwoo',
            'lastName' => 'Jeon',
            'email' => 'angelica.ramirez192001@gmail.com',
            'cpNumber' => '09123456789',
            'birthday' => '1996-07-17',
            'sex' => 'Male',
            'civilStat' => 'Single',
            'address' => 'Seoul, South Korea',
            'password' => Hash::make('User1234!'),
            'admin_id' => 1
        ]);
    }
}
