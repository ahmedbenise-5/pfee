<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Classes', function (Blueprint $table) {
            $table->id();
            $table->string('Nom_Classe');
            $table->bigInteger('Niveauxdetudes_id')->unsigned();
            $table->foreign('Niveauxdetudes_id')->references('id')
                                                ->on('niveauxdetudes')
                                                ->onDelete('cascade')
                                                ->onUpdate('cascade');
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
        Schema::dropIfExists('Classes');
    }
}
