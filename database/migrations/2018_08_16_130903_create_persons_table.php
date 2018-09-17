<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();                 // Полное Имя Актера
            $table->string('name_original')->nullable();        // Полное Имя Актера
            $table->string('image')->nullable();                // Аватар Актера
            $table->string('stature')->nullable();              // Рост
            $table->string('birthplace')->nullable();           // Место рождения
            $table->string('date')->nullable();                 // День рождение
            $table->string('slug')->nullable();
            $table->timestamps();
        });

        \Illuminate\Support\Facades\DB::statement('ALTER TABLE persons ADD FULLTEXT search(name, name_original)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persons');
    }
}
