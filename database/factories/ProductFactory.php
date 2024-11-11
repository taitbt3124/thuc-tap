<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,  // Tạo tên sản phẩm ngẫu nhiên
            'description' => $this->faker->sentence,  // Tạo mô tả ngẫu nhiên
            'price' => $this->faker->numberBetween(10000, 100000),  // Tạo giá ngẫu nhiên từ 10000 đến 100000
            'stock' => $this->faker->numberBetween(0, 100),  // Tạo số lượng stock ngẫu nhiên từ 0 đến 100
            'status' => 'available',  // Mặc định trạng thái là 'available'
        ];
    }
}
