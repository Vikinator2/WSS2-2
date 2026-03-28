<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'iPhone 15 Pro Max Clone',
                'description' => 'Flagship phone with advanced camera, sleek design, and premium feel at budget price',
                'price' => 299.00,
                'category' => 'Electronics',
                'image' => 'glowstick.jpg',
                'is_featured' => true,
                'stock' => 100
            ],
            [
                'name' => 'Samsung Galaxy S24 Ultra',
                'description' => 'Premium Android with AI features, stunning display, and great camera',
                'price' => 349.00,
                'category' => 'Electronics',
                'image' => 'glowstick-film.jpg',
                'is_featured' => false,
                'stock' => 50
            ],
            [
                'name' => 'Nike Air Max 90 Style',
                'description' => 'Classic athletic shoes with air cushioning - stylish and comfortable',
                'price' => 89.00,
                'category' => 'Footwear',
                'image' => 'happi-jacket.jpg',
                'is_featured' => true,
                'stock' => 75
            ],
            [
                'name' => 'Adidas Ultraboost Style',
                'description' => 'Running shoes with Boost technology and breathable upper',
                'price' => 79.00,
                'category' => 'Footwear',
                'image' => 'tin-badge.jpg',
                'is_featured' => false,
                'stock' => 200
            ],
            [
                'name' => 'Gucci GG Marmont Style',
                'description' => 'Luxury handbag with signature double G buckle - elegant design',
                'price' => 199.00,
                'category' => 'Bags',
                'image' => 'muffler-towel.jpg',
                'is_featured' => false,
                'stock' => 80
            ],
            [
                'name' => 'Louis Vuitton Style Tote',
                'description' => 'Designer tote with classic monogram pattern - spacious and chic',
                'price' => 159.00,
                'category' => 'Bags',
                'image' => 'postcard-set.jpg',
                'is_featured' => false,
                'stock' => 150
            ],
            [
                'name' => 'Luxury Dive Watch',
                'description' => 'Premium automatic watch with gold bezel and water resistance',
                'price' => 249.00,
                'category' => 'Watches',
                'image' => 'a3-poster.jpg',
                'is_featured' => true,
                'stock' => 60
            ],
            [
                'name' => 'Pro Gaming Console',
                'description' => '4K gaming system with 1TB storage and wireless controller',
                'price' => 199.00,
                'category' => 'Gaming',
                'image' => 'die-cut-sticker.jpg',
                'is_featured' => false,
                'stock' => 300
            ],
            [
                'name' => 'Pro Wireless Controller',
                'description' => 'Ergonomic gamepad with motion sensors and customizable buttons',
                'price' => 49.00,
                'category' => 'Gaming',
                'image' => 'card-holder.jpg',
                'is_featured' => false,
                'stock' => 90
            ],
        ];

        foreach ($products as $product) {
            DB::table('products')->insert($product);
        }
    }
}
