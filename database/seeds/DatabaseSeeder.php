<?php

use App\Group;
use App\Student;
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
        factory(Group::class, 6)->create();
        factory(Student::class, 30)->create();
    }
}
