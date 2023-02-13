<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Sections', function (Blueprint $table) {
            $table->id();
            $table->string('nom_section');
            $table->integer('statut');
            $table->bigInteger('Niveauxdetudes_id')->unsigned();
            $table->bigInteger('classes_id')->unsigned();
            // foreign key
            $table->foreign('Niveauxdetudes_id')->references('id')->on('niveauxdetudes')->onDelete('cascade');
            $table->foreign('classes_id')->references('id')->on('classes')->onDelete('cascade');
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
        Schema::dropIfExists('Sections');
    }
}
