<?php

use Illuminate\Database\Seeder;

class ComponentCategory extends Seeder
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
            'name'  => 'Drawing',
            ],
            [
            'name'  => 'Furniture',
            ],
            [
            'name'  => 'Painting',
            ],
            [
            'name'  => 'Photography',
            ],
            [
            'name'  => 'Sculpture',
            ],
        ];

        Category::insert($data);
    }
}
