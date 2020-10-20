<?php

use Illuminate\Database\Seeder;
use App\User;
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 'name', 'email', 'password','profile_photo','gender','usertype','trn',
             $user = [

            [

                'first_name'=>'Admin',
                'last_name'=>'Admin',
 
                'email'=>'admin@it.com',
 
                'usertype'=>'admin',
                'trn'=>'123454',
 
                'password'=> bcrypt('123456789'),
 
             ],
 
             [
 
                'first_name'=>'user',
                'last_name'=>'user',
 
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
