<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ComponetSubject::class);
        $this->call(ComponentCategory::class);
        $this->call(ComponentMaterial::class);
        $this->call(ComponentMedium::class);
        $this->call(ComponentSize::class);
        $this->call(ComponentStyle::class);
    }
}
