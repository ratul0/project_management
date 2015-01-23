<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$users = [
					[
								'first_name'       => 'admin',
								'last_name'       => 'admin',
								'email'      => 'admin@pm.com',
								'password'   => Hash::make('a'),
								'created_at' => date('Y-m-d H:i:s'),
								'updated_at' => date('Y-m-d H:i:s')
					],
					[
								'first_name'       => 'teacher',
								'last_name'       => 'teacher',
								'email'      => 'teacher@pm.com',
								'password'   => Hash::make('a'),
								'created_at' => date('Y-m-d H:i:s'),
								'updated_at' => date('Y-m-d H:i:s')
					],
					[
								'first_name'       => 'cr',
								'last_name'       => 'cr',
								'email'      => 'cr@pm.com',
								'password'   => Hash::make('a'),
								'created_at' => date('Y-m-d H:i:s'),
								'updated_at' => date('Y-m-d H:i:s')
					],
					[
								'first_name'       => 'student',
								'last_name'       => 'student',
								'email'      => 'student@pm.com',
								'password'   => Hash::make('a'),
								'created_at' => date('Y-m-d H:i:s'),
								'updated_at' => date('Y-m-d H:i:s')
					]

		];

		DB::table('users')->insert($users);

		foreach(range(5, 50) as $index)
		{
			User::create([
						'first_name' => $faker->firstName,
						'last_name'  => $faker->lastName,
						'email'      => $faker->email,
						'mobile'      => $faker->phoneNumber,
						'password'   => Hash::make('a'),
						'created_at' => date('Y-m-d H:i:s'),
						'updated_at' => date('Y-m-d H:i:s')


			]);




		}
	}

}