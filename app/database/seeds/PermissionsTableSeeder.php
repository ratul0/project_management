<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PermissionsTableSeeder extends Seeder {

	public function run()
	{
		$permissions =
					[
								'invite_teacher'    => 'Invite Teacher',
								'invite_student'    => 'Invite Student',
								'create_batch'      =>  'Create Batch',
								'create_project'    => 'Create Project'
					];


		foreach($permissions as $permission_name=>$display_name)
		{
			Permission::create([
						'name'         => $permission_name,
						'display_name' => $display_name
			]);
		}
	}

}