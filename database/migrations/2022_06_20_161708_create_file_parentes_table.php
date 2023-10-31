<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileParentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_parentes', function (Blueprint $table) {
            $table->id();
            $table->string('NomFolder')->nullable();
            $table->bigInteger('parenteID')->unsigned();
            $table->foreign('parenteID')->references('id')->on('parentes')->onDelete('cascade');
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
        Schema::dropIfExists('file_parentes');
    }
}
