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
        // $this->call(UsersTableSeeder::class);
        factory(\App\Post::class, 20)->create();
        factory(\App\Comment::class,30)->create();
        factory(\App\User::class,5)->create();
    }
}
