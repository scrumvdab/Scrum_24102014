<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
	}
        // seeder database Forum
       // public function run()
	//{
	//	Eloquent::unguard();
//
//		$this->call('ForumTableSeeder');
//	}

}
