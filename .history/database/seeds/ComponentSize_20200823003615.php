<?php

use Illuminate\Database\Seeder;

class ComponentSize extends Seeder
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

        Size::insert($data);
    }
}
