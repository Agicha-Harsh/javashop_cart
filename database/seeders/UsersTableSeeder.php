<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Harsh',
            'email_id' => 'harsh@example.com',
            'password' => '$2y$10$RuOLzG6G9A/13SYDobYTB.ahKh9emm/RHdk7GKC3/wXgUZJBk9ZP6', // secret
            'address' => '74 New York',
        ]);

        User::create([
            'name' => 'Pratik',
            'email_id' => 'pratik@example.com',
            'password' => '$2y$10$RuOLzG6G9A/13SYDobYTB.ahKh9emm/RHdk7GKC3/wXgUZJBk9ZP6', // secret
            'address' => 'Thakur Complex',
        ]);
    }
}
