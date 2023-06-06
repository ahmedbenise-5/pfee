<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presences', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_etudiant')->unsigned();
            $table->bigInteger('id_enseignants')->unsigned();
            $table->bigInteger('id_niveauxdetudes')->unsigned();
            $table->bigInteger('id_classes')->unsigned();
            $table->bigInteger('id_sections')->unsigned();
            $table->foreign('id_niveauxdetudes')->references('id')->on('niveauxdetudes')->onDelete('cascade');
            $table->foreign('id_classes')->references('id')->on('Classes')->onDelete('cascade');
            $table->foreign('id_enseignants')->references('id')->on('enseignants')->onDelete('cascade');
            $table->foreign('id_etudiant')->references('id')->on('etudiants')->onDelete('cascade');
            $table->foreign('id_sections')->references('id')->on('sections')->onDelete('cascade');
            $table->date('presences_date');
            $table->boolean('presences_status');
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
        Schema::dropIfExists('presences');
    }
}
