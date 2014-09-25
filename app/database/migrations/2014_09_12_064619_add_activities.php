<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddActivities extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        DB::table('activities')->insert(array(
            'title' => 'Artikel 1',
            'body' => 'Dit is een test, blablablabla',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        DB::table('activities')->insert(array(
            'title' => 'Artikel 2',
            'body' => 'Dit is ook een test, woooooooooooooop',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        DB::table('activities')->insert(array(
            'title' => 'Artikel 3',
            'body' => 'Dit is nog een test, mimimimimimimimimimimimimi',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        DB::table('activities')->where('title', '=', 'Artikel 1')->delete();
        DB::table('activities')->where('title', '=', 'Artikel 2')->delete();
        DB::table('activities')->where('title', '=', 'Artikel 3')->delete();
    }

}
