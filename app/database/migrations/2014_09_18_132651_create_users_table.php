<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function($table) {
            $table->increments('id');
            $table->string('username', 100);
            $table->string('password', 100);
            $table->integer('level_auth');
            $table->string('firstname', 100);
            $table->string('lastname', 100);
            $table->integer('zip');
            $table->string('email', 100)->unique();
            $table->string('phone', 100);
            $table->text('message')->nullable();
            $table->boolean('news');
            $table->boolean('news_extra');
            $table->string('banknr', 100);
            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('users');
    }

}

