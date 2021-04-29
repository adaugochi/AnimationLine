<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'first_name' => 'Adaa',
                'last_name' => 'Mgbede',
                'email' => 'admin@example.com',
                'job_title' => 'CTO',
                'password' => Hash::make(12345678)
            ],
            [
                'first_name' => 'Abayomi',
                'last_name' => 'Ogundairo',
                'email' => 'support@animationline.com',
                'job_title' => 'CEO',
                'password' => Hash::make('Abayomi2018')
            ],
        ]);
    }
}
