<?php

use Illuminate\Database\Seeder;
use App\Model\size as Size;

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
