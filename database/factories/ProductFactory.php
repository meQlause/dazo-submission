<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'image'         => 'https://images.unsplash.com/photo-1511376777868-611b54f68947?w=80&q=80&auto=format&fit=crop',
            'nama_produk'   => $this->faker->words(3, true),
            'kategori_id'   => Category::factory(),
            'sku'           => strtoupper($this->faker->unique()->bothify('SKU-####')),
            'stok_produk'   => $this->faker->boolean(),
            'variants'      => 1,
            'type'          => 'Fisik',
            'stok'          => $this->faker->numberBetween(1, 100),
            'harga_modal'   => $this->faker->numberBetween(50000, 200000),
            'harga_jual'    => $this->faker->numberBetween(75000, 300000),
            'harga_spesial' => $this->faker->optional()->numberBetween(70000, 250000),
        ];
    }
}
