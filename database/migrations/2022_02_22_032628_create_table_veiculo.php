<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableVeiculo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('veiculo')){
            Schema::create('veiculo', function (Blueprint $table) {
                $table->id();
                $table->enum('tipo', ['Moto', 'Carro', ' Caminhão']);
                $table->string('marca');
                $table->string('modelo');
                $table->string('versao')->nullable();
                $table->timestamps();
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('veiculo');
    }
}
