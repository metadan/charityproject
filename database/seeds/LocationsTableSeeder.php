<?php

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = array('Cambridge', 'London', 'Brighton', 'Bath', 'Bristol', 'Manchester', 'Liverpool');

    	foreach($locations as $location){
            DB::table('locations')->insert([
                'location' => $location
            ]);
        }
    }
}
