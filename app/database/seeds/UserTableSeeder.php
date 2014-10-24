<?php

class UserTableSeeder extends Seeder {

    public function run() {
        DB::table('users')->delete();
        DB::table('forum_categories')->delete();
        DB::table('forum_comments')->delete();
        DB::table('forum_groups')->delete();
        DB::table('forum_threads')->delete();
        User::create(array(
            'username' => 'ValentinoGahide',
            'password' => Hash::make('secret'),
            'level_auth' => 2,
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
        User::create(array(
            'username' => 'MaartenPasschyn',
            'password' => Hash::make('secret'),
            'level_auth' => 2,
            'firstname' => 'Maarten ',
            'lastname' => 'Passchyn',
            'zip' => 8450,
            'email' => 'maarten.passchyn@gmail.com',
            'phone' => '0496/23.58.94',
            'message' => 'Test',
            'news' => true,
            'news_extra' => true,
            'banknr' => '266376931.001',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));
        User::create(array(
            'username' => 'SebastiaanDeslypere',
            'password' => Hash::make('secret'),
            'level_auth' => 2,
            'firstname' => 'Sebastiaan',
            'lastname' => 'Deslypere',
            'zip' => 9000,
            'email' => 'sebastiaanslyper@gmail.com',
            'phone' => '0479/45.42.13',
            'message' => 'Test',
            'news' => true,
            'news_extra' => true,
            'banknr' => '123456789.007',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));
        User::create(array(
            'username' => 'admin',
            'password' => Hash::make('secret'),
            'level_auth' => 3,
            'firstname' => 'admin',
            'lastname' => 'admin',
            'zip' => 8553,
            'email' => 'admin@admin.com',
            'phone' => '0479/45.42.13',
            'message' => 'Test',
            'news' => true,
            'news_extra' => true,
            'banknr' => '123456789.007',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        ForumGroup::create(array(
            'id' => 0,
            'title' => 'General discussion',
            'author_id' => 1
        ));
        ForumCategory::create(array(
            'group_id' => 1,
            'title' => 'Test Category 1',
            'author_id' => 1
        ));
        ForumCategory::create(array(
            'group_id' => 1,
            'title' => 'Test Category 2',
            'author_id' => 1
        ));
        ForumThread::create(array(
            'group_id' => 1,
            'category_id' => 1,
            'thread_id' => 1,
            'body' => 'Hallo',
            'author_id' => 1
        ));
        ForumThread::create(array(
            'group_id' => 1,
            'category_id' => 1,
            'thread_id' => 1,
            'body' => 'Hallo',
            'author_id' => 1
        ));
        ForumComment::create(array(
            'group_id' => 1,
            'body' => 'Hallo',
            'author_id' => 1,
            'category_id' => 1
        ));
         ForumComment::create(array(
            'group_id' => 1,
            'body' => 'Hallo2',
            'author_id' => 1,
            'category_id' => 1
        ));

        ForumGroup::create(array(
            'id' => 1,
            'title' => 'General discussion2',
            'author_id' => 1
        ));
        ForumCategory::create(array(
            'group_id' => 1,
            'title' => 'Test Category 2.1',
            'author_id' => 1
        ));
        ForumCategory::create(array(
            'group_id' => 1,
            'title' => 'Test Category 2.2',
            'author_id' => 1
        ));
        ForumGroup::create(array(
            'id' => 2,
            'title' => 'General discussion3',
            'author_id' => 2
        ));
        ForumCategory::create(array(
            'group_id' => 2,
            'title' => 'Test Category 3.1',
            'author_id' => 2
        ));
        ForumCategory::create(array(
            'group_id' => 2,
            'title' => 'Test Category 3.2',
            'author_id' => 2
        ));
    }

}
