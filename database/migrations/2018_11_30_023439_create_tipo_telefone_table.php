<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoTelefoneTable extends Migration {

	public function up()
	{
		Schema::create('tray01_tipoTelefone', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->enum("tipo",['Residencial', 'Comercial','Celular']);
		});
	}

	public function down()
	{
		Schema::drop('tray01_tipoTelefone');
	}

}
