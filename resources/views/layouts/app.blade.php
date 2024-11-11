<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Cửa Hàng')</title>
    <!-- Các link CSS và JS -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <!-- Thanh điều hướng -->
    <nav>
        <a href="/products">Trang chủ</a>
        <a href="/orders">Đơn hàng</a>
        <!-- Các liên kết khác -->
    </nav>

    <div class="container">
        <!-- Nội dung chính của trang -->
        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2023 Cửa Hàng</p>
    </footer>

    <!-- Link các file JS nếu cần -->
</body>
</html>
