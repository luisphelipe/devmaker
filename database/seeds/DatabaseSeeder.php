<?php

use Illuminate\Database\Seeder;

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
        $admin = factory('App\User')->create([
            'name' => 'Admin',
            'email' => 'admin@luisphelipe.me'
        ]);

        $users = factory('App\User', 10)->create();

        foreach($users as $user) {
            factory('App\Post', 3)->create([
                'user_id' => $user->id
            ]);
        }
    }
}
