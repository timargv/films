<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('original_title')->nullable();
            $table->string('slogan')->nullable();
            $table->string('budget')->nullable();
            $table->date('date')->nullable();
            $table->integer('age')->nullable();
            $table->float('rating')->nullable();
            $table->string('time')->nullable();
            $table->string('image')->nullable();
            $table->string('sh_description')->nullable();
            $table->text('description')->nullable();
            $table->text('trailer_field')->nullable();
            $table->text('video_field')->nullable();
            $table->string('slug');

//            актеры            - person_id
//            жанры             - genre_id
//            страна            - country_id
//            год               - year_id
//            сценарий          - writer
//            продюсер          - director
//            оператор          - operator
//            композитор        - composer
//            художник          - artist
//            монтаж            - mounting
//            бюджет            - budget
//            сборы в США       - fees in the USA
//            сборы в мире      - fees in the world
//            сборы в России    - fees in Russia
//            зрители           - spectators
//            премьера (мир).   - premiere (world).
//            премьера (РФ)     - premiere (RF)
//            возраст           - age
//            рейтинг MPAA      - rating MPAA
//            рейтинг PG-13     - rating PG-13
//            время             - time
//            тематика          - subjects
//            связанные фильмы  - films_id


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('films');
    }
}
