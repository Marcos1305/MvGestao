<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsEndereco extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('enderecos', function (Blueprint $table) {
            $table->string('Rua', 100);
            $table->integer('Numero');
            $table->integer('CEP');
            $table->string('Bairro', 50);
            $table->string('Cidade', 50);
            $table->string('Estado', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Endereco', function (Blueprint $table) {
            //
        });
    }
}
