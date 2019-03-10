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
        $user = factory(App\User::class)->make([
            'name' => 'demo',
            'email' => 'demo@localhost',
            'password' => bcrypt('demo'),
        ]);
        $user->save();
    }
}
