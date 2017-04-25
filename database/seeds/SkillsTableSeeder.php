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
                        'Dog walking',
                        'Fashion design',
                        'Gardening',
                        'House cleaning',
                        'House keeping',
                        'Learning',
                        'Learning (general)',
                        'Learning English',
                        'Learning Math',
                        'Learning Physics',
                        'Marketing',
                        'Moving furniture',
                        'Mowing',
                        'Pet sitting',
                        'Plumbing',
                        'Programming (general)',
                        'Programming (Html and CSS)',
                        'Programming (Javascript)',
                        'Programming (PHP)',
                        'Programming (Python)',
                        'Reading',
                        'Repairing (general)',
                        'Repairing bicycles',
                        'Repairing cars',
                        'Sales',
                        'Sewing',
                        'Tailoring',
                        );

    	foreach($skills as $skill){
            DB::table('skills')->insert([
                'skill' => $skill
            ]);
        }
    }
}
