<?php

namespace Database\Seeders;

use App\Models\AssessType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssessTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AssessType::insert([
            ['name' => 'Therapy'],
            ['name' => 'Employment - Drivers']
        ]);
    }
}
