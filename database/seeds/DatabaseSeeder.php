<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
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
