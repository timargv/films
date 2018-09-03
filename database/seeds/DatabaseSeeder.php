<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(ActorsTableSeeder::class);
         $this->call(GenresTableSeeder::class);
         $this->call(CarerTableSeeder::class);
         $this->call(FilmTableSeeder::class);

         for ($i = 0; $i < 11; $i++) {
             DB::table('actor_carers')->insert([
                 ['actor_id' => $i, 'carer_id' => rand(1, 2)],
                 ['actor_id' => $i, 'carer_id' => rand(3, 4)],
                 ['actor_id' => $i, 'carer_id' => rand(5, 6)],
                 ['actor_id' => $i, 'carer_id' => rand(7, 8)],
             ]);
         }

        for ($i = 0; $i < 50; $i++) {
            DB::table('film_genres')->insert([
                ['film_id' => $i, 'genre_id' => rand(1, 31)],
                ['film_id' => $i, 'genre_id' => rand(1, 31)],
                ['film_id' => $i, 'genre_id' => rand(1, 31)],
            ]);
        }

        for ($i = 0; $i < 50; $i++) {
            DB::table('film_actors')->insert([
                ['film_id' => $i, 'actor_id' => rand(1, 3)],
                ['film_id' => $i, 'actor_id' => rand(4, 10)],
                ['film_id' => $i, 'actor_id' => rand(11, 20)],
                ['film_id' => $i, 'actor_id' => rand(11, 20)],

                ['film_id' => $i, 'actor_id' => rand(20, 25)],
                ['film_id' => $i, 'actor_id' => rand(26, 30)],
                ['film_id' => $i, 'actor_id' => rand(31, 35)],
                ['film_id' => $i, 'actor_id' => rand(36, 40)],
            ]);
        }


    }
}
