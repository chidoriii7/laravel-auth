<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        for ($i = 0; $i < 10; $i++) {
            $post = new Post();

            $post->title = $faker->sentence(3);
            $post->content = $faker ->text(200);
            $post->slug = Str::of($post->title)->slug('-');

            $post->save();
        }
    }
}
