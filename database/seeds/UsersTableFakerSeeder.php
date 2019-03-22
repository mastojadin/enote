<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class UsersTableFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(6,1000) as $index) {
            $name = $faker->unique()->userName;

            if ($index < 9) {
                $role_id = 3;
            } else {
                $role_id = 4;
            }

            DB::table('users')->insert([
                'name' => $name,
                'email' => $name . '@' . $name . '.com',
                'password' => bcrypt('123'),
                'role_id' => $role_id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
