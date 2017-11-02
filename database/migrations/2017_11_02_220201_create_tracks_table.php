<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTracksTable extends Migration {

	public function up()
	{
		Schema::create('tracks', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 255);
			$table->integer('artist_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('tracks');
	}
}