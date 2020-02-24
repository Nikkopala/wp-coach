<?php

use Illuminate\Database\Seeder;
use App\Team;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [
            // ESSECI
            [
                'club_id' => '1',
                'name' => 'under 13',
            ],[
                'club_id' => '1',
                'name' => 'under 15',
            ],[
                'club_id' => '1',
                'name' => 'under 17',
            ],[
                'club_id' => '1',
                'name' => 'senior B',
            ],
            // SESTESE
            [
                'club_id' => '2',
                'name' => 'under 13',
            ],[
                'club_id' => '2',
                'name' => 'under 15',
            ],[
                'club_id' => '2',
                'name' => 'under 17',
            ],[
                'club_id' => '2',
                'name' => 'senior A',
            ],
            // NGM
            [
                'club_id' => '3',
                'name' => 'under 13',
            ],[
                'club_id' => '3',
                'name' => 'under 15',
            ],[
                'club_id' => '3',
                'name' => 'under 17',
            ],[
                'club_id' => '3',
                'name' => 'senior C',
            ],[
                'club_id' => '3',
                'name' => 'senior A',
            ],
        ];

        foreach($seeds as $seed){
            Team::create($seed);
        }
    }
}
