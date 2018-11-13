<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*factory(App\Project::class, 20)->create()->each(function ($u) {
	        $u->posts()->save(factory(App\Post::class)->make());
	    });*/
	    DB::table('projects')->insert([
            'name' => str_random(10),
            'description' => str_random(10),
            'images' => bcrypt('secret'),
        ]);
    }
}
