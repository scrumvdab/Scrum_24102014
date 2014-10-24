<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumThreadsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('forum_threads', function(Blueprint $table) {
            $table->increments('id');
            $table->text('body'); // +/-65000 karakters
            $table->integer('group_id');
            $table->integer('category_id');
            $table->integer('thread_id');
            $table->integer('author_id');
            $table->timestamps(); // wanneer entry geupdated
            // wanneer entry geupdated
            // time stamps creëert velden created_at en updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('forum_threads');
    }

}
