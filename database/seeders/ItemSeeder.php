<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the seeder.
     *
     * @return void
     */
    public function run()
    {
        // Sample data
        $items = [
            [
                'title' => 'iPhone 9',
                'description' => 'An apple mobile which is nothing like apple',
                'price' => 549,
                'rating' => 4.69,
                'brand' => 'Apple',
                'category' => 'smartphones',
                'thumbnail' => 'https://cdn.dummyjson.com/product-images/1/thumbnail.jpg',
            ],
            [
                'title' => 'Samsung Galaxy S20',
                'description' => 'A flagship smartphone from Samsung',
                'price' => 799,
                'rating' => 4.75,
                'brand' => 'Samsung',
                'category' => 'smartphones',
                'thumbnail' => 'https://cdn.dummyjson.com/product-images/2/thumbnail.jpg',
            ],
            [
                'title' => 'Dell XPS 13',
                'description' => 'A premium ultrabook with top-notch performance',
                'price' => 1299,
                'rating' => 4.85,
                'brand' => 'Dell',
                'category' => 'laptops',
                'thumbnail' => 'https://cdn.dummyjson.com/product-images/3/thumbnail.jpg',
            ],
            [
                'title' => 'Sony PlayStation 5',
                'description' => 'The next-generation gaming console from Sony',
                'price' => 499,
                'rating' => 4.9,
                'brand' => 'Sony',
                'category' => 'gaming',
                'thumbnail' => 'https://cdn.dummyjson.com/product-images/4/thumbnail.jpg',
            ],
            [
                'title' => 'Amazon Echo Dot',
                'description' => 'A smart speaker with Alexa voice control',
                'price' => 49.99,
                'rating' => 4.6,
                'brand' => 'Amazon',
                'category' => 'smart_home',
                'thumbnail' => 'https://cdn.dummyjson.com/product-images/5/thumbnail.jpg',
            ],
            [
                'title' => 'Logitech G Pro Wireless Mouse',
                'description' => 'A high-performance gaming mouse with wireless connectivity',
                'price' => 149.99,
                'rating' => 4.8,
                'brand' => 'Logitech',
                'category' => 'accessories',
                'thumbnail' => 'https://cdn.dummyjson.com/product-images/6/thumbnail.jpg',
            ],
            [
                'title' => 'Apple Watch Series 6',
                'description' => 'The latest smartwatch from Apple with advanced health tracking features',
                'price' => 399,
                'rating' => 4.7,
                'brand' => 'Apple',
                'category' => 'wearables',
                'thumbnail' => 'https://cdn.dummyjson.com/product-images/7/thumbnail.jpg',
            ],
            [
                'title' => 'Canon EOS R5',
                'description' => 'A professional-grade mirrorless camera with 8K video recording',
                'price' => 3899,
                'rating' => 4.9,
                'brand' => 'Canon',
                'category' => 'cameras',
                'thumbnail' => 'https://cdn.dummyjson.com/product-images/8/thumbnail.jpg',
            ],
            [
                'title' => 'Nintendo Switch',
                'description' => 'A versatile gaming console that can be used as a handheld or connected to a TV',
                'price' => 299,
                'rating' => 4.8,
                'brand' => 'Nintendo',
                'category' => 'gaming',
                'thumbnail' => 'https://cdn.dummyjson.com/product-images/9/thumbnail.jpg',
            ],
            [
                'title' => 'Bose QuietComfort 35 II Headphones',
                'description' => 'Premium noise-canceling headphones for immersive audio experience',
                'price' => 299.95,
                'rating' => 4.7,
                'brand' => 'Bose',
                'category' => 'audio',
                'thumbnail' => 'https://cdn.dummyjson.com/product-images/10/thumbnail.jpg',
            ],
        ];

        // Insert sample data into the database
        foreach ($items as $item) {
            Item::create($item);
        }
    }
}

