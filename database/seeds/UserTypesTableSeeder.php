<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->insert([
            [
                'id' => 1,
                'key' => 'admin',
                'name' => 'Administrator',
            ],
            [
                'id' => 2,
                'key' => 'client',
                'name' => 'Client',
            ],
        ]);
    }
}
