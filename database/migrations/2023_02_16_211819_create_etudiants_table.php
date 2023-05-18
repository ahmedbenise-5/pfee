<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('date_naissance');
            $table->string('annee_academique');
            $table->string('adresss');




            $table->bigInteger('id_gender')->unsigned();
            $table->bigInteger('id_nationalities')->unsigned();
            $table->bigInteger('id_niveauxdetudes')->unsigned();
            $table->bigInteger('id_classes')->unsigned();
            $table->bigInteger('id_sections')->unsigned();
            $table->bigInteger('religion_id')->unsigned();
            $table->bigInteger('id_parentes')->unsigned();


            $table->foreign('id_gender')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('id_nationalities')->references('id')->on('nationalities')->onDelete('cascade');
            $table->foreign('id_niveauxdetudes')->references('id')->on('niveauxdetudes')->onDelete('cascade');
            $table->foreign('id_classes')->references('id')->on('Classes')->onDelete('cascade');
            $table->foreign('id_sections')->references('id')->on('Sections')->onDelete('cascade');
            $table->foreign('religion_id')->references('id')->on('religions')->onDelete('cascade');
            $table->foreign('id_parentes')->references('id')->on('parentes')->onDelete('cascade');
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
        Schema::dropIfExists('etudiants');
    }
}
