<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 255);
			$table->string('email', 255);
			$table->string('password', 255);
			$table->ipAddress('ipaddress');
			$table->string('address', 255);
			$table->string('city', 255);
			$table->timestamps();
			$table->rememberToken('rememberToken');
			$table->softDeletes();
			$table->boolean('isAdmin')->default(0);
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}