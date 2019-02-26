<?php

use Illuminate\Database\Seeder;
use App\Club;

class ClubsTableSeeder extends Seeder
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
                'name' =>'esseci',
            ],
            [
                'name' =>'NGM Firenze Pallanuoto',
            ],
            [
                'name' =>'Sestese',
            ]
        ];

        foreach($seeds as $seed){
            Club::create($seed);
        }
    }
}
