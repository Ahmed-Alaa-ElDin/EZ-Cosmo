<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = Country::insert([
            [
                'name' => 'Egypt',
            ],[
                'name' => 'Turkey',
            ],[
                'name' => 'France',
            ],[
                'name' => 'USA',
            ],[
                'name' => 'UK',
            ],[
                'name' => 'Saudi Arabia',
            ],[
                'name' => 'Qatar',
            ],[
                'name' => 'Algeria',
            ],

        ]);   
    }
}
