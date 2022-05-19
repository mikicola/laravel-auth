<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;

// per ordinare l'url
use illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $title = 'prova con titoli uguali';
        Post::create([
            'title'     => $title,
            'content'   => $faker->text(rand(100, 500)),
            'slug'      => Post::generateSlug($title)
        ]);
        Post::create([
            'title'     => $title,
            'content'   => $faker->text(rand(100, 500)),
            'slug'      => Post::generateSlug($title)
        ]);
        Post::create([
            'title'     => $title,
            'content'   => $faker->text(rand(100, 500)),
            'slug'      => Post::generateSlug($title)
        ]);

        for ($i = 0; $i < 100; $i++){
            // $post = new Post();
            // per ordinare l'url
            $title =$faker->words(rand(2, 10), true);
            // $slug = $post->generateSlug($title);

            Post::create([
                'title'     => $title,
                'content'   => $faker->text(rand(100, 500)),
                'slug'      => Post::generateSlug($title)
            ]);
        }
    }
}
