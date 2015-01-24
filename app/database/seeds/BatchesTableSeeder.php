<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class BatchesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();


		foreach(range(1, 10) as $index)
		{
			Batch::create([
				'name'  => $faker->company,
				'description'=> $faker->text(200)
			]);
		}
	}

}