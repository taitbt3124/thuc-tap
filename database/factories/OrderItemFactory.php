<?php

namespace Database\Factories;

use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    protected $model = OrderItem::class;

    public function definition()
    {
        return [
            'order_id' => Order::factory(), // Tạo đơn hàng mới cho mỗi mục đơn hàng
            'product_id' => Product::factory(), // Chọn sản phẩm ngẫu nhiên
            'quantity' => $this->faker->numberBetween(1, 5),
            'price' => $this->faker->numberBetween(10000, 100000),
        ];
    }
}

