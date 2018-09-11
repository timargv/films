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
         $this->call(PersonsTableSeeder::class);
//         $this->call(GenresTableSeeder::class);
//         $this->call(CarerTableSeeder::class);
//         $this->call(FilmTableSeeder::class);
//         $this->call(CountryTableSeeder::class);
//         $this->call(YearTableSeeder::class);
//         $this->call(ThematicTableSeeder::class);

//         for ($i = 1; $i < 11; $i++) {
//             DB::table('person_carers')->insert([
//                 ['person_id' => $i, 'carer_id' => rand(1, 2)],
//                 ['person_id' => $i, 'carer_id' => rand(3, 4)],
//                 ['person_id' => $i, 'carer_id' => rand(5, 6)],
//                 ['person_id' => $i, 'carer_id' => rand(7, 8)],
//             ]);
//         }
//
//        for ($i = 1; $i < 50; $i++) {
//            DB::table('film_genres')->insert([
//                ['film_id' => $i, 'genre_id' => rand(1, 31)],
//                ['film_id' => $i, 'genre_id' => rand(1, 31)],
//                ['film_id' => $i, 'genre_id' => rand(1, 31)],
//            ]);
//        }
//
//        for ($i = 1; $i < 50; $i++) {
//            DB::table('film_persons')->insert([
//                ['film_id' => $i, 'person_id' => rand(1, 3)],
//                ['film_id' => $i, 'person_id' => rand(4, 10)],
//                ['film_id' => $i, 'person_id' => rand(11, 20)],
//                ['film_id' => $i, 'person_id' => rand(11, 20)],
//
//                ['film_id' => $i, 'person_id' => rand(20, 25)],
//                ['film_id' => $i, 'person_id' => rand(26, 30)],
//                ['film_id' => $i, 'person_id' => rand(31, 35)],
//                ['film_id' => $i, 'person_id' => rand(36, 40)],
//            ]);
//        }
//
//        for ($i = 1; $i < 50; $i++) {
//            DB::table('film_directors')->insert([
//                ['film_id' => $i, 'director_id' => rand(1, 31)],
//                ['film_id' => $i, 'director_id' => rand(1, 31)],
//                ['film_id' => $i, 'director_id' => rand(1, 31)],
//            ]);
//        }
//
//        for ($i = 1; $i < 50; $i++) {
//            DB::table('film_writers')->insert([
//                ['film_id' => $i, 'writer_id' => rand(1, 31)],
//                ['film_id' => $i, 'writer_id' => rand(1, 31)],
//                ['film_id' => $i, 'writer_id' => rand(1, 31)],
//            ]);
//        }
//
//        for ($i = 1; $i < 150; $i++) {
//            DB::table('film_years')->insert([
//                ['film_id' => $i, 'year_id' => rand(1, 120)],
//            ]);
//        }
//
//        for ($i = 1; $i < 50; $i++) {

//        }
//
//        for ($i = 1; $i < 50; $i++) {
//            DB::table('film_operators')->insert([
//                ['film_id' => $i, 'operator_id' => rand(1, 31)],
//                ['film_id' => $i, 'operator_id' => rand(1, 31)],
//                ['film_id' => $i, 'operator_id' => rand(1, 31)],
//            ]);
//        }
//
//        for ($i = 1; $i < 50; $i++) {
//            DB::table('film_musicians')->insert([
//                ['film_id' => $i, 'musician_id' => rand(1, 31)],
//                ['film_id' => $i, 'musician_id' => rand(1, 31)],
//                ['film_id' => $i, 'musician_id' => rand(1, 31)],
//            ]);
//        }
//
//        for ($i = 1; $i < 50; $i++) {
//            DB::table('film_artists')->insert([
//                ['film_id' => $i, 'artist_id' => rand(1, 31)],
//                ['film_id' => $i, 'artist_id' => rand(1, 31)],
//                ['film_id' => $i, 'artist_id' => rand(1, 31)],
//            ]);
//        }
//
//        for ($i = 1; $i < 50; $i++) {
//            DB::table('film_mountings')->insert([
//                ['film_id' => $i, 'mounting_id' => rand(1, 31)],
//                ['film_id' => $i, 'mounting_id' => rand(1, 31)],
//                ['film_id' => $i, 'mounting_id' => rand(1, 31)],
//            ]);
//        }
//
//        for ($i = 1; $i < 50; $i++) {
//            DB::table('film_relateds')->insert([
//                ['film_id' => $i, 'related_id' => rand(1, 31)],
//                ['film_id' => $i, 'related_id' => rand(1, 31)],
//                ['film_id' => $i, 'related_id' => rand(1, 31)],
//            ]);
//        }
//
//        for ($i = 1; $i < 50; $i++) {
//            DB::table('film_thematics')->insert([
//                ['film_id' => $i, 'thematic_id' => rand(1, 31)],
//                ['film_id' => $i, 'thematic_id' => rand(1, 31)],
//                ['film_id' => $i, 'thematic_id' => rand(1, 31)],
//            ]);
//        }


    }
}
