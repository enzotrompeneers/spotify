<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContestsTable extends Migration {

	public function up()
	{
		Schema::create('contests', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->datetime('startDate');
			$table->datetime('endDate');
		});
	}

	public function down()
	{
		Schema::drop('contests');
	}
}