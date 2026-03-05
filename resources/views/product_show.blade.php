<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Trang chủ' }}</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 
    
    <style>
        body
         { 
            background: #f9fafc;
         }
        .content {
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            margin-top: 30px; /* Tăng khoảng cách dưới header */
        }
        /* Style cho footer thêm màu nền để nổi bật */
        .footer-custom {
            background-color: #343a40; 
            color: #ccc;
            padding: 20px 0;
            margin-top: 50px;
        }
    </style>
</head>
<body>

    @include('layouts.header')


<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            @if($product->product_img)
                <img src="/{{ $product->product_img }}" class="img-fluid rounded" style="max-height:400px; object-fit:cover;">
            @else
                <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height:400px;">
                    No Image
                </div>
            @endif
        </div>
        <div class="col-md-6">
            <h2>{{ $product->product_name }}</h2>
            <p class="text-danger fw-bold" style="font-size: 24px;">{{ number_format($product->product_price,0,',','.') }}₫</p>
            
            <!-- Hiển thị toàn bộ mô tả sản phẩm -->
            <div class="product-description" style="white-space: pre-wrap; margin-top: 20px; color:#555;">
                {!! nl2br(e($product->product_description)) !!}
            </div>

            <div class="d-flex gap-2 mt-3">
                <a href="javascript:void(0);" class="btn btn-warning btn-add-cart" data-id="{{ $product->product_id }}">
                    <i class="fas fa-cart-plus"></i> Thêm giỏ
                </a>
                <a href="/products" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Quay lại
                </a>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
