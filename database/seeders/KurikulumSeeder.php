<?php

namespace Database\Seeders;

use App\Models\Kurikulum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KurikulumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kurikulum::create([
            'guid' => '0cb3c6e2-fc79-11ee-85ed-509a4cce9dc0',
            'tahun_akademik' => 'Antara 2023/2024',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
