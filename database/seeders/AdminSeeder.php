<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::factory()->create([
            'name' => 'Hazem',
            'email' => 'hhazm6745@gmail.com',
            'password' => bcrypt('Hazem@2005'),
            'role' => 'manager',
        ]);
    }
}
