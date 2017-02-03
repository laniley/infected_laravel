<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestFulfillmentConditionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quest_fulfillment_conditions', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('quest_id')->unsigned();
			$table->integer('quest_fulfillment_condition_type_id')->unsigned();
			$table->integer('fulfillment_amount')->unsigned();

			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

			$table->foreign('quest_id')->references('id')->on('quests');
			$table->foreign('quest_fulfillment_condition_type_id', 'quest_fulfillment_condition_type_foreign')->references('id')->on('quest_fulfillment_condition_types');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		if (Schema::hasTable('quest_fulfillment_conditions'))
		{
			Schema::drop('quest_fulfillment_conditions');
		}
	}

}
