<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'id' => '2',
                'user_id' => '2',
                'posts' => 'つぶやいた内容を表示します。',
                'created_at' => '2022-08-23 00:00:00',
                'updated_at' => '2022-08-23 00:00:00',
            ],
        ]);
    }
}
