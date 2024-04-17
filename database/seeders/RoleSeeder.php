<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'guid' => 'e559bb14-fc78-11ee-85ed-509a4cce9dc0',
            'nama' => 'program studi',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Role::create([
            'guid' => 'e559da1d-fc78-11ee-85ed-509a4cce9dc0',
            'nama' => 'mahasiswa',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
