<?php

use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$skills = array('Accounting', 
                        'Babysitting', 
                        'Business management',
                        'Car cleaning',
                        'Carpentry',
                        'Catering',
                        'Customer service',
                        'Data Analysis',
                        'Digital Media',
                        'Dog walking',
                        'Drawing',
                        'Event Planning',
                        'Fashion design',
                        'Gardening',
                        'Graphic Design',
                        'Hair Styling',
                        'House cleaning',
                        'House keeping',
                        'Learning',
                        'Marketing',
                        'Moving furniture',
                        'Mowing',
                        'Pet sitting',
                        'Plumbing',
                        'Programming',
                        'Reading',
                        'Repairing',
                        'Sales',
                        'Sewing',
                        'Software Development',
                        'Tailoring',
                        'Travel Planning');

    	foreach($skills as $skill){
            DB::table('skills')->insert([
                'skill' => $skill
            ]);
        }
    }
}
