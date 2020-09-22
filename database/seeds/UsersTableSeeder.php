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
        $Curator     = Role::where('name', 'Curator')->first();

        $Admin_user = User::create([
            'name'          =>  'System Adminstrator',
            'mobile'        =>  '09952247045',
            'category'      =>  'N/A',
            'email'         =>  'admin@min-art.org',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password'      =>   Hash::make('bxtr1605'),
        ]);

        $Artist_user = User::create([
            'name'          =>  'Artist',
            'mobile'        =>  '09952247045',
            'category'      =>  'Art Spaces',
            'email'         =>  'maynard@min-art.org',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password'      =>   Hash::make('bxtr1605'),
        ]);

        $Curator_user = User::create([
            'name'          =>  'Curator',
            'mobile'        =>  '09952247045',
            'category'      =>  'Art Spaces',
            'email'         =>  'curator@min-art.org',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password'      =>   Hash::make('bxtr1605'),
        ]);

        $backdoor_user = User::create([
            'name'          =>  'Backdoor',
            'mobile'        =>  '09952247045',
            'category'      =>  'N/A',
            'email'         =>  'backdoor@backdoor.com',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password'      =>   Hash::make('bxtr1605'),
        ]);

        $Admin_user->roles()->attach($Admin);
        $Artist_user->roles()->attach($Artist);
        $Curator_user->roles()->attach($Curator);
        $backdoor_user->roles()->attach($Admin);
    }
}
