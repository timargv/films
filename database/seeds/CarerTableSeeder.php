<?php

use App\Carer;
use Illuminate\Database\Seeder;

class CarerTableSeeder extends Seeder
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

        Carer::create(['title' => 'Актер']);
        Carer::create(['title' => 'Режиссер']);
        Carer::create(['title' => 'Сценарист']);
        Carer::create(['title' => 'Продюсер']);
        Carer::create(['title' => 'Оператор']);
        Carer::create(['title' => 'Композитор']);
        Carer::create(['title' => 'Художник']);
        Carer::create(['title' => 'Монтажер']);
    }
}
