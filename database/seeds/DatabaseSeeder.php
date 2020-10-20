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
        // $this->call(UserSeeder::class);
        $user = [

            [

                'name'=>'Admin',
 
                'email'=>'admin@it.com',
 
                'usertype'=>'admin',
                'trn'=>'123454',
 
                'password'=> bcrypt('123456789'),
 
             ],
 
             [
 
                'name'=>'User',
 
                'email'=>'user@itsolutionstuff.com',
 
                'usertype'=>'landlord',
                'trn'=>'12345344',
 
                'password'=> bcrypt('123456789'),
 
             ],
 
         ];
 
   
 
         foreach ($user as $key => $value) {
 
             User::create($value);
 
         }
    }
}
