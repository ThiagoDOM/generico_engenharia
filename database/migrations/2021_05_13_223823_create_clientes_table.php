<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('razao_social');
            $table->string('nm_fantasia');
            $table->char('cnpj',14);
            $table->text('endereco');
            $table->string('email');
            $table->string('telefone',14);
            $table->string('nm_responsavel');
            $table->char('cpf',11);
            $table->string('celular',14);
            $table->unsignedBigInteger('id_usuario');
            $table->timestamps();
        });

        Schema::table('clientes', function (Blueprint $table) {
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
