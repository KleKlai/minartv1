<?php

use Illuminate\Database\Seeder;
use App\Model\Style;

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
            'name'  => 'Abstract',
            ],
            [
            'name'  => 'Abstract Expressionism',
            ],
            [
            'name'  => 'Art Deco',
            ],
            [
            'name'  => 'Conceptual',
            ],
            [
            'name'  => 'Cubism',
            ],
            [
            'name'  => 'Dada',
            ],
            [
            'name'  => 'Documentary',
            ],
            [
            'name'  => 'Expressionism',
            ],
            [
            'name'  => 'Figurative',
            ],
            [
            'name'  => 'Fine Art',
            ],
            [
            'name'  => 'Folk',
            ],
            [
            'name'  => 'Illustration',
            ],
            [
            'name'  => 'Impressionism',
            ],
            [
            'name'  => 'Minimalism',
            ],
            [
            'name'  => 'Modern',
            ],
            [
            'name'  => 'Photorealism',
            ],
            [
            'name'  => 'Pop Art',
            ],
            [
            'name'  => 'Portraiture',
            ],
            [
            'name'  => 'Realism',
            ],
            [
            'name'  => 'Street Art',
            ],
            [
            'name'  => 'Surrealism',
            ],
        ];

        Style::insert($data);
    }
}
