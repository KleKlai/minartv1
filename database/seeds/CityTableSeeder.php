<?php

use Illuminate\Database\Seeder;
use App\Model\City;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
            'name'  => 'Davao City',
            ],
            [
            'name'  => 'Tagum City',
            ],
            [
            'name'  => 'Digos City',
            ],
            [
            'name'  => 'Panabo City',
            ],
            [
            'name'  => 'Mati City',
            ],
        ];

        City::insert($data);
    }
}
