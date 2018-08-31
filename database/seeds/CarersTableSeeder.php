<?php

use Illuminate\Database\Seeder;

class CarersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // factory(\App\Carer::class, 7)->create();

        \App\Carer::create(['title' => 'Актер']);
        \App\Carer::create(['title' => 'Режиссер']);
        \App\Carer::create(['title' => 'Сценарист']);
        \App\Carer::create(['title' => 'Продюсер']);
        \App\Carer::create(['title' => 'Оператор']);
        \App\Carer::create(['title' => 'Композитор']);
        \App\Carer::create(['title' => 'Художник']);
        \App\Carer::create(['title' => 'Монтажер']);
    }
}
