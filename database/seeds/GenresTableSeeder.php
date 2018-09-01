<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
//        factory(\App\Genre::class, 10)->create();

        \App\Genre::create(['title' => 'Аниме']);
        \App\Genre::create(['title' => 'Биография']);
        \App\Genre::create(['title' => 'Боевик']);
        \App\Genre::create(['title' => 'Вестерн']);
        \App\Genre::create(['title' => 'Военный']);
        \App\Genre::create(['title' => 'Детектив']);
        \App\Genre::create(['title' => 'Детский']);
        \App\Genre::create(['title' => 'Для Взрослых']);
        \App\Genre::create(['title' => 'Документальный']);
        \App\Genre::create(['title' => 'Драма']);
        \App\Genre::create(['title' => 'Игра']);
        \App\Genre::create(['title' => 'История']);
        \App\Genre::create(['title' => 'Комедия']);
        \App\Genre::create(['title' => 'Концерт']);
        \App\Genre::create(['title' => 'Короткометражка']);
        \App\Genre::create(['title' => 'Криминал']);
        \App\Genre::create(['title' => 'Мелодрама']);
        \App\Genre::create(['title' => 'Музыка']);
        \App\Genre::create(['title' => 'Мультфильм']);
        \App\Genre::create(['title' => 'Мюзикл']);
        \App\Genre::create(['title' => 'Новости']);
        \App\Genre::create(['title' => 'Приключения']);
        \App\Genre::create(['title' => 'Реальное ТВ']);
        \App\Genre::create(['title' => 'Семейный']);
        \App\Genre::create(['title' => 'Спорт']);
        \App\Genre::create(['title' => 'Ток-Шоу']);
        \App\Genre::create(['title' => 'Триллер']);
        \App\Genre::create(['title' => 'Ужасы']);
        \App\Genre::create(['title' => 'Фантастика']);
        \App\Genre::create(['title' => 'Фильм-Нуар']);
        \App\Genre::create(['title' => 'Фэнтези']);
    }
}
