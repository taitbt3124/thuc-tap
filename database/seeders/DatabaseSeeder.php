<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Tạo 10 khách hàng
        Customer::factory(10)->create();

        // Tạo 50 sản phẩm
        Product::factory(50)->create();

        // Tạo 20 đơn hàng, mỗi đơn hàng có từ 1 đến 5 sản phẩm
        Order::factory(20)->create()->each(function ($order) {
            OrderItem::factory(rand(1, 5))->create([
                'order_id' => $order->id,
            ]);
        });
    }
}
