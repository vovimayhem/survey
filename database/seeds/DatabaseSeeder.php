<?php

use App\Models\Result;
use App\Models\User;
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
        $numResults = 1000;
        $numUsers = 50;
        factory(Result::class, $numResults)->create();
        factory(User::class, $numUsers)->create();
    }
}
