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
            $table->string('title');
            $table->string('original_title')->nullable();
            $table->string('slogan')->nullable();
            $table->integer('actor_id');
            $table->integer('genre_id');
            $table->integer('country_id')->nullable();
            $table->integer('year_id')->nullable();
            $table->integer('director_id')->nullable();
            $table->integer('operator_id')->nullable();
            $table->integer('composer_id')->nullable();
            $table->integer('artist_id')->nullable();
            $table->integer('mounting_id')->nullable();
            $table->string('budget')->nullable();
            $table->date('world_premiere')->nullable();
            $table->integer('age')->nullable();
            $table->float('rating')->nullable();
            $table->float('time')->nullable();
            $table->string('subject_id')->nullable();
            $table->string('poster_img')->nullable();
            $table->text('video_field')->nullable();
            $table->string('slug');


//            сценарий          - scenario
//            продюсер          - producer
//            оператор          - operator
//            композитор        - composer
//            художник          - artist
//            монтаж            - mounting
//            жанр              - genre
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
