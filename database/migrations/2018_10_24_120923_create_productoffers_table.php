<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductoffersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('productoffers', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 101);
			$table->text('descriptionoffer', 65535)->nullable();
			$table->text('descriptionbussiness', 65535)->nullable();
			$table->integer('categoryid')->nullable()->index('categoryid');
			$table->integer('deliverymethodid')->nullable();
			$table->float('girapercentage', 10, 0)->nullable();
			$table->string('pricelistdocument')->nullable();
			$table->integer('user_id')->unsigned()->nullable()->index('user_id');
			$table->boolean('confirmed')->default(0);
			$table->boolean('deleted')->default(0);
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
		Schema::drop('productoffers');
	}

}
