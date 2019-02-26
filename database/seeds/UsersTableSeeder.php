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
                'name' =>'Niccolò Paldino',
                'email' => 'niccolo.paldino@gmail.com',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'password' => bcrypt('password'),
            ],
            [
                'name' =>'Pasquale Trippa',
                'email' => 'pasquale.trippa@gmail.com',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'password' => bcrypt('password'),
            ],
            [
                'name' =>'Daniele Roccia',
                'email' => 'daniele.roccia@gmail.com',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'password' => bcrypt('password'),
            ],
            [
                'name' =>'Andrea Sgerbi',
                'email' => 'andrea.sgerbi@gmail.com',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'password' => bcrypt('password'),
            ],
            
        ];

        foreach($seeds as $seed){
            User::create($seed);
        }
    }
}
