<?php

use Illuminate\Database\Seeder;
use App\Ethnic;

class EthnicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Ethnic::truncate();
       // Populate the array if needed
       // used: https://en.wikipedia.org/wiki/Classification_of_ethnicity_in_the_United_Kingdom
       $ethnics = [
           'White English',
           'White Irish',
           'Asian Indian',
           'Asian Pakistani',
           'Black African',
           'Arab'
       ];

       foreach ($ethnics as $ethnic){
           Ethnic::create([
               'ethnic_origin_name' => $ethnic,

           ]);
       }
    }
}
