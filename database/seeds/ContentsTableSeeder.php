<?php

use Illuminate\Database\Seeder;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*factory(App\Content::class, 20)->create()->each(function ($u) {
	        $u->posts()->save(factory(App\Post::class)->make());
	    });*/
	    DB::table('contents')->insert([
            'title' => str_random(10),
            'description' => str_random(10),
            'images' => bcrypt('secret'),
        ]);
    }
}
