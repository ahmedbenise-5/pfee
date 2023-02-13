<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsEnseignantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_sections__enseignants', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('enseignants_id');
            $table->unsignedBigInteger('sections_id');


            $table->foreign('enseignants_id')->references('id')->on('enseignants')->onDelete('cascade');
            $table->foreign('sections_id')->references('id')->on('Sections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_sections__enseignants');
    }
}
