<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProductoffersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('productoffers', function(Blueprint $table)
		{
			$table->foreign('user_id', 'productoffers_ibfk_1')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('categoryid', 'productoffers_ibfk_2')->references('id')->on('categories')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('productoffers', function(Blueprint $table)
		{
			$table->dropForeign('productoffers_ibfk_1');
			$table->dropForeign('productoffers_ibfk_2');
		});
	}

}
