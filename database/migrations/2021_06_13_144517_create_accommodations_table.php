<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccommodationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accommodations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('accommodates');
            $table->integer('floor');
            $table->text('description');
            $table->integer('quantity');
            $table->string('number', 70);
            $table->tinyInteger('status');
            $table->timestamps();
        });

        Schema::table('accommodations', function (Blueprint $table) {
            $table->foreignId('id_type');
            $table->foreign('id_type')->references('id')->on('types');
            $table->foreignId('id_reservation');
            $table->foreign('id_reservation')->references('id')->on('reservations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accommodations', function(Blueprint $table) {
            //Exclui o campo que tem a foreign key
            $table->dropForeign('accommodations_id_type_foreign');
            $table->dropColumn('id_type');
            $table->dropForeign('accommodations_id_reservation_foreign');
            $table->dropColumn('id_reservation');
        });
    }
}
