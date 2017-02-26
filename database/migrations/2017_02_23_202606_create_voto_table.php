<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votos', function(Blueprint $table){
		$table->increments('id');
		$table->integer('id_candidato');
		$table->integer('sessao');
		$table->integer('estrelas');
		$table->string('id_usuario');
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('votos');
    }
}
