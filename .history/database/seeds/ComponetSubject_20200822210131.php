<?php

use Illuminate\Database\Seeder;
use App\Model\Subject;

class ComponetSubject extends Seeder
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
            'name'  => 'Math',
            ],
            [
            'name'  => 'Science',
            ],
        ];

        Subject::insert($data);
    }
}
