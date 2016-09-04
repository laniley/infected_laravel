<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfectionsUsersMmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infections_users_mm', function (Blueprint $table) {
            $table->integer('infection_id')->unsigned();
			$table->integer('user_id')->unsigned();

			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
			$table->timestamp('cured_at');

			$table->foreign('infection_id')->references('id')->on('infections');
			$table->foreign('user_id')->references('id')->on('users');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('infections_users_mm');
    }
}
