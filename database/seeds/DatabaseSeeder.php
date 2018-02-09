<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create User
        $user = factory(\App\User::class)->create([
            'name'     => 'Jan Christlieb',
            'email'    => 'mail@janchristlieb.de',
            'password' => bcrypt('password'),
        ]);
        $this->command->info('User created');

        // Create Posts with the generated user as author
        $posts = factory(\App\Post::class, 20)->create(['user_id' => $user->id]);
        $this->command->info('Posts created');

        $tags = collect();

        collect(['javascript', 'php', 'laravel', 'vue'])->each(function ($tag) use ($tags) {
            $tags->push(factory(\App\Tag::class)->create(['name' => $tag]));
        });

        // Create comments for each post
        $posts->each(function ($post) use ($tags) {
            $post->tags()->saveMany($tags->random(rand(1, 3)));
            factory(\App\Comment::class, rand(0, 5))->create([
                'post_id' => $post->id,
            ]);
        });
        $this->command->info('Comments created');

        $this->command->info('Tags created');
    }
}
