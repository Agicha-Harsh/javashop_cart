<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\AdminUser;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(AdminUserSeeder::class);
         $this->call(OrderItemsTableSeeder::class);
         $this->call(OrderTableSeeder::class);
         $this->call(ProductsTableSeeder::class);
         $this->call(UsersTableSeeder::class);
    }
}
