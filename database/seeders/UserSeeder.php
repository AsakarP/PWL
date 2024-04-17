<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nrp' => '2172000',
            'name' => 'Admin',
            'email' => '2172000@maranatha.ac.id',
            'password' => Hash::make('asd123'),
            'guid_role' => "e559bb14-fc78-11ee-85ed-509a4cce9dc0",
            'created_at' => now(),
            'updated_at' => now()
        ]);
        User::create([
            'nrp' => '2172040',
            'name' => 'Dheandra',
            'email' => '2172040@maranatha.ac.id',
            'password' => Hash::make('asd123'),
            'guid_role' => "e559da1d-fc78-11ee-85ed-509a4cce9dc0",
            'guid_kurikulum' => "0cb3c6e2-fc79-11ee-85ed-509a4cce9dc0",
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
