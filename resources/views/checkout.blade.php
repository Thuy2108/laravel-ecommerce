<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán - Đơn hàng #{{ $order->order_id }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('layouts.header')

<div class="container mt-5">
    <h2 class="text-center mb-4">Thanh toán - Đơn hàng #{{ $order->order_id }}</h2>

    <div class="card mb-4">
        <div class="card-header fw-bold">Thông tin đơn hàng</div>
        <div class="card-body">
            <p><strong>Khách hàng:</strong> {{ $order->order_customer }}</p>
            <p><strong>Ngày đặt:</strong> {{ $order->order_date }}</p>
            <p><strong>Ghi chú:</strong> {{ $order->order_note }}</p>
            <p><strong>Trạng thái:</strong> 
                @if($order->order_status == 1)
                    Chưa thanh toán
                @elseif($order->order_status == 2)
                    Đã thanh toán
                @else
                    Khác
                @endif
            </p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header fw-bold">Chi tiết sản phẩm</div>
        <div class="card-body p-0">
            <table class="table table-bordered table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->details as $item)
                    <tr>
                        <td>{{ $item->order_product_id }}</td>
                        <td>{{ $item->order_product_quantity }}</td>
                        <td>{{ number_format($item->order_product_price, 0, ',', '.') }} ₫</td>
                        <td>{{ number_format($item->order_product_quantity * $item->order_product_price, 0, ',', '.') }} ₫</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <h4 class="text-end text-danger fw-bold">
        Tổng tiền: {{ number_format($total, 0, ',', '.') }} ₫
    </h4>

    <div class="text-end mt-4">
        <form action="{{ route('order.confirm', $order->order_id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success btn-lg">Xác nhận thanh toán</button>
        </form>
    </div>
</div>

@include('layouts.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
