<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::insert([
            [
                'name' => 'Avene'
            ],
            [
                'name' => 'Bioderma'
            ],
            [
                'name' => 'Cleo'
            ],
            [
                'name' => 'SVR'
            ],
            [
                'name' => 'Vichy'
            ],
            [
                'name' => 'La Roche-Posay'
            ],
            [
                'name' => 'Nuxe'
            ],
            [
                'name' => 'Loreal'
            ],
            [
                'name' => 'Bourjois'
            ],
            [
                'name' => 'Uriage'
            ],
            [
                'name' => 'Garnier'
            ]
        ]
    );
    }
}
