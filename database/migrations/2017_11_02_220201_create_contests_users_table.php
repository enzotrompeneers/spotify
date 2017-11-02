<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContestsUsersTable extends Migration {

	public function up()
	{
		Schema::create('contests_users', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('contest_id')->unsigned();
			$table->integer('user_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('contests_users');
	}
}