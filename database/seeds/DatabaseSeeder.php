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

        // Create comments for each post
        $posts->each(function ($post) {
            factory(\App\Comment::class, rand(0, 5))->create([
                'post_id' => $post->id,
            ]);
        });
        $this->command->info('Comments created');

        //create tags
        factory(\App\Tag::class)->create([
            'id' => 1,
            'name' => 'PHP',
        ]);
        factory(\App\Tag::class)->create([
            'id' => 2,
            'name' => 'JavaScript',
        ]);
        factory(\App\Tag::class)->create([
            'id' => 3,
            'name' => 'CSS',
        ]);
        factory(\App\Tag::class)->create([
            'id' => 4,
            'name' => 'HTML',
        ]);
        factory(\App\Tag::class)->create([
            'id' => 5,
            'name' => 'Politics',
        ]);
        $this->command->info('Tags created');

    }
}
