<!-- resources/views/orders/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Đơn Hàng #{{ $order->id }}</h1>
    <p>Tên khách hàng: {{ $order->customer->name ?? 'Chưa có khách hàng' }}</p>
    <p><strong>Trạng thái:</strong> {{ $order->status }}</p>
    <p><strong>Tổng giá trị:</strong> {{ number_format($order->total, 0, ',', '.') }} VND</p>

    <h2>Chi Tiết Sản Phẩm</h2>
    <table>
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->items as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->product->price, 0, ',', '.') }} VND</td>
                    <td>{{ number_format($item->quantity * $item->product->price, 0, ',', '.') }} VND</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('orders.index') }}" class="btn btn-primary">Quay lại danh sách đơn hàng</a>
@endsection
