<?php

use Illuminate\Database\Seeder;

class ContinentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('continents')->insert([
            'id' => 1,
            'name' => 'Africa'
        ]); 
        DB::table('continents')->insert([
            id => 2,
            'name' => 'Asia'
        ]);
        DB::table('continents')->insert([
            'id' => 3,
            'name' => 'Europe'
        ]); 
        DB::table('continents')->insert([
            id => 4,
            'name' => 'North America'
        ]); 
        DB::table('continents')->insert([
            'id' => 5,
            'name' => 'Oceania'
        ]); 
        DB::table('continents')->insert([
            'id' => 6,
            'name' => 'South America'
        ]); 
    }
}
