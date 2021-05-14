<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropostasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propostas', function (Blueprint $table) {
            $table->id();
            $table->date('dt_proposta');
            $table->text('endereco');
            $table->float('vl_total');
            $table->float('vl_sinal');
            $table->integer('qt_parcelas');
            $table->float('vl_parcelas');
            $table->date('dt_inicio_pgto');
            $table->integer('dt_parcelas');
            $table->string('documento');
            $table->boolean('status');
            $table->unsignedBigInteger('id_cliente');
            $table->timestamps();
        });

        Schema::table('propostas', function (Blueprint $table) {
            $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('propostas');
    }
}
