<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Carrier',
            'price' => '2000',
            'description' => 'This is some text for the Carrier',
            'image' => 'carrier7.jpg',
        ]);

        Product::create([
            'name' => 'Macbook',
            'price' => '233',
            'description' => 'This is some text for the Macbook',
            'image' => 'macbook.jpg',
        ]);

        Product::create([
            'name' => 'Tracking Bag',
            'price' => '50',
            'description' => 'This is some text for the Tracking Bag',
            'image' => 'Tracking Bag.jpg',
        ]);

        Product::create([
            'name' => 'Wheel Chair',
            'price' => '3000',
            'description' => 'This is some text for the Wheel Chair',
            'image' => '4.jpg',
        ]);
    }
}
