<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();

        $Admin       = Role::where('name', 'Administrator')->first();
        $Artist      = Role::where('name', 'Artist')->first();

        $Admin_user = User::create([
            'name'          =>  'System Adminstrator',
            'mobile'        =>  '09952247045',
            'categories'    =>  'N/A',
            'email'         =>  'admin@mindanaoart.com',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password'      =>   Hash::make('bxtr1605'),
        ]);

        $Artist_user = User::create([
            'name'          =>  'Maynard Magallen',
            'mobile'        =>  '09952247045',
            'categories'    =>  'Art Spaces',
            'email'         =>  'maynard@mindanaoart.com',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password'      =>   Hash::make('bxtr1605'),
        ]);

        $Admin_user->roles()->attach($Admin);
        $Artist_user->roles()->attach($Artist);
    }
}
