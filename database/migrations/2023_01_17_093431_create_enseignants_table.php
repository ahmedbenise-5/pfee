<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnseignantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enseignants', function (Blueprint $table) {
            $table->id();
            $table->string('Nom_enseignants');
            $table->string('email');
            $table->string('password', 60);
            $table->string('niveaux_etudes');
            $table->string('Statut');
            $table->bigInteger('Genders_id')->unsigned();
            $table->bigInteger('specializations_id')->unsigned();
            $table->date('Date_join');
            $table->string('Adress');
            $table->timestamps();

            $table->foreign('Genders_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('specializations_id')->references('id')->on('specializations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enseignants');
    }
}
