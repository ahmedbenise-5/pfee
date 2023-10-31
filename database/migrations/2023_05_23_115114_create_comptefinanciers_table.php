<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComptefinanciersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comptefinanciers', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->bigInteger('id_recuEtudaint')->nullable()->unsigned();
            $table->bigInteger('id_recuechanges')->nullable()->unsigned();
            $table->foreign('id_recuEtudaint')->references('id')->on('recu_etudiants')->onDelete('cascade');
            $table->foreign('id_recuechanges')->references('id')->on('recu_de_echanges')->onDelete('cascade');
            $table->decimal('debit')->nullable();
            $table->decimal('credit')->nullable();
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
        Schema::dropIfExists('comptefinanciers');
    }
}
