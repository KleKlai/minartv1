<?php

use Illuminate\Database\Seeder;

class ComponentSize extends Seeder
use App\Model\Size;
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
            'name'  => '2x3 ft.',
            ],
            [
            'name'  => 'Small',
            ],
            [
            'name'  => 'Medium',
            ],
            [
            'name'  => 'Large',
            ],
            [
            'name'  => 'Oversized',
            ],
        ];

        Size::insert($data);
    }
}
