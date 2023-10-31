<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->date('date_facture');
            $table->bigInteger('id_frais')->unsigned();
            $table->bigInteger('id_etudiant')->unsigned();
            $table->bigInteger('id_niveauxdetudes')->unsigned();
            $table->bigInteger('id_classes')->unsigned();
            $table->foreign('id_niveauxdetudes')->references('id')->on('niveauxdetudes')->onDelete('cascade');
            $table->foreign('id_classes')->references('id')->on('Classes')->onDelete('cascade');
            $table->foreign('id_frais')->references('id')->on('frais')->onDelete('cascade');
            $table->decimal('montante');
            $table->string('description')->nullable();
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
        Schema::dropIfExists('factures');
    }
}
