<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('dica')){
            Schema::create('dica', function (Blueprint $table) {
                $table->id();
                $table->longText('descricao');
                $table->bigInteger('user_id')->unsigned();
                $table->bigInteger('veiculo_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('user');
                $table->foreign('veiculo_id')->references('id')->on('veiculo');
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
        Schema::dropIfExists('dica');
    }
}
