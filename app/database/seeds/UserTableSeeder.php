<?php

class UserTableSeeder extends Seeder {

    public function run() {
        DB::table('users')->delete();
        User::create(array(
            'username' => 'ValentinoGahide',
            'password' => Hash::make('secret'),
            'level_auth' => 3,
            'firstname' => 'Valentino',
            'lastname' => 'Gahide',
            'zip' => 8553,
            'email' => 'valentinogahide@gmail.com',
            'phone' => '0479/45.42.13',
            'message' => 'Test',
            'news' => true,
            'news_extra' => true,
            'banknr' => '123456789.007',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));
    }

}
