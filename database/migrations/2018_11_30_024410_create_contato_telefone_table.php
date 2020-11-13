<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContatoTelefoneTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tray01_contatoTelefone', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string("numero",20);
			$table->integer("idContato")->unsigned();
            $table->integer('idTipoTelefone')->unsigned();

            $table->foreign("idContato")
                ->references('id')->on('tray01_contatos')
                ->onDelete('cascade');

            $table->foreign('idTipoTelefone')
                ->references('id')->on('tray01_tipoTelefone');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tray01_contatoTelefone');
	}

}
