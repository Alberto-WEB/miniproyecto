<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTwDocumentosCorporativosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tw_documentos_corporativos', function (Blueprint $table) {
            $table->id();
            $table->string('S_ArchivoUrl', 255)->nullable();

            $table->unsignedBigInteger('tw_corporativos_id');
            $table->foreign('tw_corporativos_id')->references('id')->on('tw_corporativos');

            $table->unsignedBigInteger('tw_documentos_id');
            $table->foreign('tw_documentos_id')->references('id')->on('tw_documentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tw_documentos_corporativos');
    }
}
