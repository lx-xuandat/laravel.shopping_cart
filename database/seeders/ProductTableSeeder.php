<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 100; $i++) {
            $product = new \App\Models\Product([
                'imagePath' => 'https://salt.tikicdn.com/cache/280x280/ts/product/fc/7b/b0/88008acfabf8bbc7a6a7276025b19fab.jpg',
                'title' => 'Smart Phone A',
                'description' => "Some quick example text to build on the card title and make up the bulk of the card's content.",
                'price' => 12,
            ]);

            $product->save();
        }
    }
}
