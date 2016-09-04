<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
          $table->string('fb_id')->unique();
          $table->string('first_name')->nullable();
          $table->string('last_name')->nullable();
          $table->string('gender')->nullable();
          $table->string('locale')->nullable();
          $table->integer('score')->default(0);
          $table->integer('max_infections')->default(1);
          $table->integer('eps')->default(5);
          $table->integer('rps')->default(5);

          $table->timestamp('last_login_at')->default('0000-00-00 00:00:00');
          $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
          $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

          $table->string('access_token')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
