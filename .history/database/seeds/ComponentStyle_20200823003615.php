<?php

use Illuminate\Database\Seeder;

class ComponentStyle extends Seeder
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
            'name'  => 'Administrator',
            ],
            [
            'name'  => 'Artist',
            ],
        ];

        Style::insert($data);
    }
}
