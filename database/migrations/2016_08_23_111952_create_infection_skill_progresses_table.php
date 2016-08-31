<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfectionSkillProgressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infection_skill_progresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('infection_id')->unsigned();
            $table->integer('infection_skill_id')->unsigned();
            $table->integer('progress')->unsigned();

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

            $table->foreign('infection_id')->references('id')->on('infections');
            $table->foreign('infection_skill_id')->references('id')->on('infection_skills');

            $table->unique(array('infection_id', 'infection_skill_id'), 'inf_id_skill_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('infection_skill_progresses');
    }
}
