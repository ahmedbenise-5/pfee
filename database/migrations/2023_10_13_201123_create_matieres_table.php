<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matieres', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('enseignants');
            $table->bigInteger('id_classes')->unsigned();
            $table->bigInteger('id_niveauxdetudes')->unsigned();
            $table->foreign('id_classes')->references('id')->on('Classes')->onDelete('cascade');
            $table->foreign('id_niveauxdetudes')->references('id')->on('niveauxdetudes')->onDelete('cascade');
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
        Schema::dropIfExists('matieres');
    }
}
