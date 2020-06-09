<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            [
                'id' => 1,
                'key' => 'logo',
                'name' => 'Logo Animation',
            ],
            [
                'id' => 2,
                'key' => 'text',
                'name' => 'Kinetic Text Topography Animation',
            ],
            [
                'id' => 3,
                'key' => 'video',
                'name' => '2D Video Animation',
            ],
        ]);
    }
}
