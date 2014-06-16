<?php

class UsersTableSeeder extends Seeder{
	public function run() {
		$user = new User;
		$user->firstname = 'Peter';
		$user->lastname = 'Cruickshank';
		$user->email = 'peter@cruickshank.com';
		$user->password = Hash::make('password');
		$user->telephone = '07812345678';
		$user->admin = '1';
		$user->save();
	}
}