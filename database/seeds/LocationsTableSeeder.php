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
        $locations = array('Aberdeen', 
                           'Barsnley',
                           'Basildon',
                           'Belfast',
                           'Birmingham',
                           'Blackburn',
                           'Blackpool',
                           'Bolton',
                           'Bournmouth',
                           'Bradford',
                           'Brighton',
                           'Bath',
                           'Bristol',
                           'Bury',
                           'Cambridge',
                           'Cardiff',
                           'Chelmsford',
                           'Coventry',
                           'Derby',
                           'Doncaster',
                           'Dudley',
                           'Edinburgh',
                           'Glasgow',
                           'Leeds',
                           'Leicester',
                           'Liverpool',
                           'London',
                           'Manchester',
                           'Middlesbrough',
                           'Milton Keynes',
                           'North Tyneside',
                           'Nottingham',
                           'Peterborough',
                           'Plymouth', 
                           'Portsmouth',
                           'Rochdale',
                           'Salford',
                           'Sandwell',
                           'Sheffield',
                           'Southampton',
                           'Sunderland',
                           'Swansea',
                           'Warrington',
                           'Wigan',
                           'York');

    	foreach($locations as $location){
            DB::table('locations')->insert([
                'location' => $location
            ]);
        }
    }
}


