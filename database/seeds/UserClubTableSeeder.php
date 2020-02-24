<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Club;


class UserClubTableSeeder extends Seeder
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
                'user_id' =>'1',
                'club_id' => '1',
            ],
            [
                'user_id' =>'1',
                'club_id' => '2',
            ],
            [
                'user_id' =>'1',
                'club_id' => '3',
            ],
            [
                'user_id' =>'2',
                'club_id' => '1',
            ],
            [
                'user_id' =>'3',
                'club_id' => '2',
            ],
            [
                'user_id' =>'4',
                'club_id' => '3',
            ]
        ];

        foreach($seeds as $seed){
            User::find($seed['user_id'])->clubs()->attach($seed['club_id']);
        }
    }
}
