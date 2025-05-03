<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Cleaning Product 1',
                'description' => 'Description of Product 1.',
                'image_path' => 'img/product1.jpg',
                'store' => 'Store A1',
                'category' => 'cleaning-products',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cleaning Product 2',
                'description' => 'Description of Product 2.',
                'image_path' => 'img/product2.jpg',
                'store' => 'Store A2',
                'category' => 'cleaning-products',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cleaning Product 3',
                'description' => 'Description of Product 3.',
                'image_path' => 'img/product3.jpg',
                'store' => 'Store A2',
                'category' => 'cleaning-products',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fashion Product 1',
                'description' => 'Description of Fashion Product 1.',
                'image_path' => 'img/fashion1.jpg',
                'store' => 'Store B1',
                'category' => 'fashion',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fashion Product 2',
                'description' => 'Description of Fashion Product 2.',
                'image_path' => 'img/fashion2.jpg',
                'store' => 'Store B2',
                'category' => 'fashion',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fashion Product 3',
                'description' => 'Description of Fashion Product 3.',
                'image_path' => 'img/fashion3.jpg',
                'store' => 'Store B3',
                'category' => 'fashion',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Home Product 1',
                'description' => 'Description of Home Product 1.',
                'image_path' => 'img/home1.jpg',
                'store' => 'Store C1',
                'category' => 'home-goods',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Home Product 2',
                'description' => 'Description of Home Product 2.',
                'image_path' => 'img/home2.jpg',
                'store' => 'Store C2',
                'category' => 'home-goods',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Home Product 3',
                'description' => 'Description of Home Product 3.',
                'image_path' => 'img/home3.jpg',
                'store' => 'Store C3',
                'category' => 'home-goods',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
