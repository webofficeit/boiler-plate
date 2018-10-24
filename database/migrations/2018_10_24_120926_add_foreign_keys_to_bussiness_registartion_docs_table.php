<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBussinessRegistartionDocsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('bussiness_registartion_docs', function(Blueprint $table)
		{
			$table->foreign('user_id', 'bussiness_registartion_docs_ibfk_1')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('bussiness_registartion_docs', function(Blueprint $table)
		{
			$table->dropForeign('bussiness_registartion_docs_ibfk_1');
		});
	}

}
