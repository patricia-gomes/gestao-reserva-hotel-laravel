<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->increments('id');          
            $table->string('name', 100);
            $table->integer('cell');
            $table->string('cpf', 14);
            $table->integer('number_companions');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('title', 120);
            $table->integer('number_days');
            $table->timestamps();
        });

        Schema::table('guests', function (Blueprint $table) {
            $table->foreignId('id_reservation');
            $table->foreign('id_reservation')->references('id')->on('accommodations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guests', function(Blueprint $table) {
            //Exclui o campo que tem a foreign key
            $table->dropForeign('guests_id_reservation_foreign');
            $table->dropColumn('id_reservation');
        });
    }
}
