<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('contests', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('participations', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('participations', function(Blueprint $table) {
			$table->foreign('contest_id')->references('id')->on('contests')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('artists', function(Blueprint $table) {
			$table->foreign('spotify_id')->references('id')->on('spotify')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('tracks', function(Blueprint $table) {
			$table->foreign('artist_id')->references('id')->on('artists')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('contests', function(Blueprint $table) {
			$table->dropForeign('contests_user_id_foreign');
		});
		Schema::table('participations', function(Blueprint $table) {
			$table->dropForeign('participations_user_id_foreign');
		});
		Schema::table('participations', function(Blueprint $table) {
			$table->dropForeign('participations_contest_id_foreign');
		});
		Schema::table('artists', function(Blueprint $table) {
			$table->dropForeign('artists_spotify_id_foreign');
		});
		Schema::table('tracks', function(Blueprint $table) {
			$table->dropForeign('tracks_artist_id_foreign');
		});
	}
}