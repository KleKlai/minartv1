<?php

use Illuminate\Database\Seeder;
use App\Model\Material;

class ComponentMaterial extends Seeder
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
            'name'  => 'Canvas',
            ],
            [
            'name'  => 'Cardboard',
            ],
            [
            'name'  => 'Paper',
            ],
            [
            'name'  => 'Soft (Yarn, Cotton, Fabric)',
            ],
            [
            'name'  => 'Wood',
            ],
            [
            'name'  => 'Other',
            ],
        ];

        Material::insert($data);
    }
}
