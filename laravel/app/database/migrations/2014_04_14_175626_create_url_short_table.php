<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrlShortTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//Create url_shot table
		Schema::create('url_short', function($table)
	    {
	        $table->increments('id');
	        $table->string('actual_url');
	        $table->string('url_hash')->unique();
	        $table->timestamps();
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Drop url_short table
		Schema::drop('url_short');
	}

}
