<?php

use Illuminate\Database\Seeder;
use App\Model\Category;

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
            [
            'name'  => 'Mixed Media',
            ],
        ];

        Category::insert($data);
    }
}
