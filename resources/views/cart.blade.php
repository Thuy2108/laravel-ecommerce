<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Trang chủ' }}</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 
    
    <style>
        </style>
</head>
<body>
@include('layouts.header')

<div class="container mt-5">
    <h2 class="text-center mb-4 fw-bold">Giỏ hàng của bạn</h2>

    @if(!empty($cartItems))
    <form action="/cart/update" method="POST" id="cartForm">
        @csrf
        <table class="table table-bordered align-middle" id="cartTable">
            <thead>
                <tr>
                    <th>Hình</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                <tr data-id="{{ $item['id'] }}" data-price="{{ $item['price'] }}">
                    <td>
                        @if($item['image'])
                            <img src="/{{ $item['image'] }}" width="80" />
                        @else
                            No Image
                        @endif
                    </td>
                    <td>{{ $item['name'] }}</td>
                    <td class="price">{{ number_format($item['price'],0,',','.') }}₫</td>
                    <td style="width: 120px;">
                        <input type="number" name="quantities[{{ $item['id'] }}]" value="{{ $item['quantity'] }}" min="1" class="form-control quantity-input">
                    </td>
                    <td class="subtotal">{{ number_format($item['price'] * $item['quantity'],0,',','.') }}₫</td>
                    <td>
                        <a href="/cart/remove/{{ $item['id'] }}" class="btn btn-danger btn-sm">Xóa</a>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="4" class="text-end fw-bold">Tổng cộng:</td>
                    <td colspan="2" class="fw-bold text-danger" id="total">{{ number_format($total,0,',','.') }}₫</td>
                </tr>
            </tbody>
        </table>
    </form>
<!-- Nút thanh toán -->
<div class="d-flex justify-content-end mt-3">
            <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary btn-lg">
                Thanh toán
            </button>
            </form>
            </div>
    @else
        <p class="text-center">Giỏ hàng trống!</p>
    @endif
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {

function formatNumber(num) {
    return num.toLocaleString('vi-VN') + '₫';
}

function updateTotals() {
    let total = 0;

    document.querySelectorAll('.quantity-input').forEach(input => {
        const tr = input.closest('tr');
        let price = tr.dataset.price;

        price = parseFloat(price.toString().replace(/\./g, '')); // xử lý 100.000

        const qty = parseInt(input.value) || 0;
        const subtotal = price * qty;

        tr.querySelector('.subtotal').textContent = formatNumber(subtotal);
        total += subtotal;
    });

    document.getElementById('total').textContent = formatNumber(total);
}

document.querySelectorAll('.quantity-input').forEach(input => {
    input.addEventListener('input', updateTotals);
});

});

</script>

@include('layouts.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
