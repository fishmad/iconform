<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Master Crafter',
            'email' => 'fishmadwebdesign@gmail.com',
            'password' => 'password'
        ]);
        $user->assignRole('administrator');
				
        $reader = User::create([
            'name' => 'Smith Jones',
            'email' => 'bn@gmail.com',
            'password' => 'password'
        ]);
        $reader->assignRole('guest');

    }
}
