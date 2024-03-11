<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'sku' => 'sam-12345',
                'name' => 'Samsung Galaxy',
                'description' => 'Samsung Brand',
                'image' => 'https://dummyimage.com/200x300/000/fff&text=Samsung',
                'retail_price' => 200,
                'price' => 100
            ],
            [
                'sku' => 'app-12345',
                'name' => 'Apple iPhone 12',
                'description' => 'Apple Brand',
                'image' => 'https://dummyimage.com/200x300/000/fff&text=Iphone',
                'retail_price' => 600,
                'price' => 500
            ],
            [
                'sku' => 'gogle-12345',
                'name' => 'Google Pixel 2 XL',
                'description' => 'Google Pixel Brand',
                'image' => 'https://dummyimage.com/200x300/000/fff&text=Google',
                'retail_price' => 500,
                'price' => 400
            ],
            [
                'sku' => 'lg-12345',
                'name' => 'LG V10 H800',
                'description' => 'LG Brand',
                'image' => 'https://dummyimage.com/200x300/000/fff&text=LG',
                'retail_price' => 250,
                'price' => 200
            ],
            [
                'sku' => 'vivo-12345',
                'name' => 'Vivo v29',
                'description' => 'vivo Brand',
                'image' => 'https://dummyimage.com/200x300/000/fff&text=vivo',
                'retail_price' => 400,
                'price' => 320
            ],
            [
                'sku' => 'oppo-12345',
                'name' => 'Oppo reno 7 pro',
                'description' => 'oppo Brand',
                'image' => 'https://dummyimage.com/200x300/000/fff&text=oppo',
                'retail_price' => 650,
                'price' => 420
            ]
        ];

        foreach($products as $key => $product) {
            Product::create($product);
        }
    }
}
