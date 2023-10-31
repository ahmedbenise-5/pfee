<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecuEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recu_etudiants', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->bigInteger('Etudaint_id')->unsigned();
            $table->foreign('Etudaint_id')->references('id')->on('etudiants')->onDelete('cascade');
            $table->decimal('Debit')->nullable();
            $table->string('description');
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
        Schema::dropIfExists('recu_etudiants');
    }
}
