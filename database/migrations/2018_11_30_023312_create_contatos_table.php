<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContatosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tray01_contatos', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
            $table->string("nome");
            $table->string("email",60)->unique();
            $table->string("linkedin")->default('')->nullable();
            $table->string("facebook")->default('')->nullable();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tray01_contatos');
	}

}
