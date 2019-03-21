<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class AboutUsersTableFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,999) as $index) {
            $user_id = $index + 1;

            if ($index < 8) {
                DB::table('about_user')->insert([
                    'user_id' => $user_id,
                    'first_name' => $faker->firstName,
                    'middle_name' => $faker->firstName,
                    'last_name' => $faker->lastname,
                    'parent_name' => $faker->firstName,
                    'phone_one' => $faker->randomNumber(9),
                    'phone_two' => $faker->randomNumber(9),
                    'address' => $faker->address,
                    'city' => $faker->city,
                    'state' => $faker->state,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            } else {
                if ($index%7 == 0) {
                    DB::table('about_user')->insert([
                        'user_id' => $user_id,
                        'first_name' => $faker->firstName,
                        'middle_name' => $faker->firstName,
                        'last_name' => $faker->lastname,
                        'parent_name' => $faker->firstName,
                        'phone_one' => $faker->randomNumber(9),
                        'phone_two' => $faker->randomNumber(9),
                        'address' => $faker->address,
                        'city' => $faker->city,
                        'state' => $faker->state,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
                }
            }

        }
    }
}
