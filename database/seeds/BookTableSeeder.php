<?php

use Illuminate\Database\Seeder;
use App\Book;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Book::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        factory(App\Book::class, 10)->create();
    }
}
