<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'customer_id' => Customer::factory(), // Tạo khách hàng mới cho mỗi đơn hàng
            'total' => $this->faker->numberBetween(50000, 500000),
            'status' => 'pending', // trạng thái mặc định là "pending"
        ];
    }
}
