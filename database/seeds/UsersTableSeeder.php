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
        factory(App\User::class, 10)->create()->each(function ($user) {
            $user->wallet()->save(factory(App\Wallet::class)->make());
            $user->info()->save(factory(App\Information::class)->make());
        });
    }
}
