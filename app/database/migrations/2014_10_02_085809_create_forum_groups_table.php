<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumGroupsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('forum_groups', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
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
        Schema::drop('forum_groups');
    }

}
