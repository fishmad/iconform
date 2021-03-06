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
        $superUser = User::create([
            'name'      => 'Mr SU Crafter',
            'email'     => 'superuser@user.com',
            'password'  => 'password'
        ]);
        $superUser->assignRole('SuperUser', 'Manager');


        $admin = User::create([
            'name'      => 'Admin Smith Jones',
            'email'     => 'admin@email.com',
            'password'  => 'password'
        ]);
        $admin->assignRole('Admin');


        $executive = User::create([
          'name'      => 'CEO Mr Jones',
          'email'     => 'ceo@email.com',
          'password'  => 'password'
        ]);
        $executive->assignRole('CEO', 'Manager', 'Admin');


        $executive = User::create([
          'name'      => 'Exec Smith J',
          'email'     => 'exec@email.com',
          'password'  => 'password'
        ]);
        $executive->assignRole('Executive');


        $manager = User::create([
          'name'      => 'Mngr Smitherson',
          'email'     => 'manager@email.com',
          'password'  => 'password'
        ]);
        $manager->assignRole('Manager');


        $supervisor = User::create([
          'name'      => 'Suprv Smit Johns',
          'email'     => 'supervisor@email.com',
          'password'  => 'password'
        ]);
        $supervisor->assignRole('Supervisor');


        $fakeEmployee = factory(App\User::class, 50)->create();
          foreach($fakeEmployee as $user){
            $user->assignRole('Employee');
          } 


        $fakeContractor = factory(App\User::class, 20)->create();
          foreach($fakeContractor as $user){
            $user->assignRole('Contractor');
          } 


        $fakeVisitor = factory(App\User::class, 10)->create();
          foreach($fakeVisitor as $user){
            $user->assignRole('Visitor');
          } 


    }
}
