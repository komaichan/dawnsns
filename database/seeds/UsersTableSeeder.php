<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'こまいちゃん',
                'mail' => '103pen@gmail.com',
                'password' => Hash::make('miki1995918'),
                'bio' => '',
                'images' => 'dawn.png',
                'created_at' => '2022-08-09 15:00:00',
                'updated_at' => '2022-08-09 15:00:00',
            ],
        ]);
    }
}
