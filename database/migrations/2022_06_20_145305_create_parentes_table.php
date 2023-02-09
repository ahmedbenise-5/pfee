<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parentes', function (Blueprint $table) {
            $table->id();
            $table->string('Email')->unique();
            $table->string('Password');
             $table->string('NomPraent');
             $table->string('NomTravail');
             $table->string('Numerotéléphone');
             $table->string('NumeroIdentifiant');
             $table->string('adresse');
             $table->bigInteger('nationalite_id')->unsigned();
             $table->bigInteger('religion_id')->unsigned();
             $table->foreign('nationalite_id')->references('id')->on('nationalities')->onDelete('cascade');
             $table->foreign('religion_id')->references('id')->on('religions')->onDelete('cascade');
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
        Schema::dropIfExists('parentes');
    }
}
