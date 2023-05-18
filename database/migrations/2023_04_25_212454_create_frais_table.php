<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFraisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frais', function (Blueprint $table) {
            $table->id();
            $table->string('titer');
            $table->string('type_frais');
            $table->decimal('montante');
            $table->bigInteger('id_niveauxdetudes')->unsigned();
            $table->bigInteger('id_classes')->unsigned();
            $table->foreign('id_niveauxdetudes')->references('id')->on('niveauxdetudes')->onDelete('cascade');
            $table->foreign('id_classes')->references('id')->on('Classes')->onDelete('cascade');
            $table->string('description');
            $table->string('annee');
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
        Schema::dropIfExists('frais');
    }
}
