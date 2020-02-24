<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [
            [
                'name' =>'nikkopala',
                'email' => 'nikkopala@gmail.com',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'password' => bcrypt('password'),
            ],
            [
                'name' =>'nikkopala2',
                'email' => 'nikkopala+2@gmail.com',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'password' => bcrypt('password'),
            ],
            [
                'name' =>'nikkopala2',
                'email' => 'nikkopala+3@gmail.com',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'password' => bcrypt('password'),
            ],
            [
                'name' =>'nikkopala4',
                'email' => 'nikkopala+4@gmail.com',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'password' => bcrypt('password'),
            ],
            
        ];

        foreach($seeds as $seed){
            User::create($seed);
        }
    }
}
