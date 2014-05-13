<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('log', function($table)
		{
		    $table->increments('id');
		    $table->string('url');
		    $table->date('date');
		    $table->text('file');
		    $table->integer('line');
		    $table->text('message');
		    $table->string('level');
		    $table->text('stacktrace');
		    $table->string('user');
		    $table->text('context');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
