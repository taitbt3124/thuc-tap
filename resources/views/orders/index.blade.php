<!-- resources/views/orders/index.blade.php -->
@extends('layouts.app')

@section('title', 'Danh sách đơn hàng')

@section('content')
    <h1>Danh Sách Đơn Hàng</h1>

    <!-- Bảng danh sách đơn hàng -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Khách hàng</th>
                <th>Tổng giá trị</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer->name ?? 'Chưa có khách hàng' }}</td> <!-- Lấy tên khách hàng -->
                    <td>{{ number_format($order->total, 0, ',', '.') }} VND</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info">Chi tiết</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Phân trang -->
    <div class="pagination">
        {{ $orders->links() }}
    </div>
@endsection
