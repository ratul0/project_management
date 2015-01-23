<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class EntrustTableSeeder extends Seeder {

	public function run()
	{
		$admin = Role::find(1);
		$teacher = Role::find(2);
		$cr = Role::find(3);
		$student = Role::find(4);


		$invite_teacher = Permission::find(1);
		$invite_student = Permission::find(2);
		$create_batch = Permission::find(3);
		$create_project = Permission::find(4);


		$admin->attachPermission($invite_teacher);
		$admin->attachPermission($invite_student);
		$admin->attachPermission($create_batch);
		$admin->attachPermission($create_project);


		$teacher->attachPermission($invite_student);
		$teacher->attachPermission($create_batch);
		$teacher->attachPermission($create_project);

		$cr->attachPermission($invite_student);

		$user1 = User::find(1);
		$user2 = User::find(2);
		$user3 = User::find(3);
		$user4 = User::find(4);

		$user1->attachRole($admin);
		$user2->attachRole($teacher);
		$user3->attachRole($cr);
		$user4->attachRole($student);


		for($i=5;$i<=50;$i++){
			$user_ids[] = $i;
		}


		$userfaker = User::whereIn('id',$user_ids)->get();

		foreach($userfaker as $userf){
			$userf->attachRole($student);

		}


	}

}