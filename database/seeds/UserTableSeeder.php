<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        User::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        factory(App\User::class, 10)->create();
    }
}
