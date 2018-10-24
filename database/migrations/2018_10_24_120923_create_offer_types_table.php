<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOfferTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('offer_types', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->smallInteger('type')->nullable();
			$table->date('datefrom')->nullable();
			$table->date('dateto')->nullable();
			$table->integer('product_offer_id')->nullable();
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
		Schema::drop('offer_types');
	}

}
