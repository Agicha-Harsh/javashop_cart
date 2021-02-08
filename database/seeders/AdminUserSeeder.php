<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminUser;


class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminUser::create([
        	'name' => 'Kajal',
        	'email_id' => 'kajal@mail.com',
        	'password' => bcrypt('secret'),
        	'address' => '3rd Street New York',
        ]);
    }
}
