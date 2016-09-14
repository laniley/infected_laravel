<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfectionTransmisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infection_transmissions', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('infection_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('infection_wave_id')->unsigned();
			$table->integer('status')->unsigned()->default(0);

			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
			$table->timestamp('cured_at');

			$table->foreign('infection_id')->references('id')->on('infections');
            $table->foreign('infection_wave_id')->references('id')->on('infection_waves');
			$table->foreign('user_id')->references('id')->on('users');

			$table->unique(array('infection_wave_id', 'user_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('infection_transmissions');
    }
}
