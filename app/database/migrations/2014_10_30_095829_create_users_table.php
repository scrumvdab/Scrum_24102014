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
        Schema::create('users', function(Blueprint $table) {
            $table->increments('id');
            $table->string('username', 100)->unique();
            $table->string('password', 100);
            $table->enum('lvl_auth', [0, 1, 2])->default(0);
            $table->string('firstname', 100);
            $table->string('lastname', 100);
            $table->string('adress', 100);
            $table->integer('zip');
            $table->string('city', 100);
            $table->string('email', 100)->unique();
            $table->string('phone', 100);
            $table->text('message')->nullable();
            $table->boolean('news')->default(true);
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

