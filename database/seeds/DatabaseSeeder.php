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
         $this->call(UsersTableSeeder::class);
         $this->call(CountriesTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(NationalitiesTableSeeder::class);
        $this->call(EthnicsTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
    }
}
