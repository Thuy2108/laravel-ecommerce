<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Trang chủ' }}</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 
    
    <style>
        body { background: #f9fafc; }
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
        /* Hover card sản phẩm */
.card:hover {
    transform: translateY(-5px) scale(1.02); /* nâng nhẹ và phóng to */
    box-shadow: 0 15px 25px rgba(0,0,0,0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
}

/* Hover ảnh trong card */
.card img {
    transition: transform 0.3s ease;
}

.card:hover img {
    transform: scale(1.05); /* zoom nhẹ ảnh */
}

/* Hover nút Xem chi tiết / Thêm giỏ */
.card .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

    </style>
</head>
<body>

@include('layouts.header')

<div class="container mt-5">
    <h2 class="text-center mb-4 fw-bold">Danh sách sản phẩm</h2>
    <div class="row">
        @foreach ($products as $p)
        <div class="col-md-3 mb-4">
            <div class="card h-100 shadow-sm">
                @if($p->product_img)
                    <img src="/{{ $p->product_img }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                @else
                    <div class="fakeimg w-100 d-flex align-items-center justify-content-center bg-secondary"
                         style="height:200px; color:white;">No Image</div>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $p->product_name }}</h5>
                    <p class="text-danger fw-bold">{{ number_format($p->product_price, 0, ',', '.') }}₫</p>
                    <p class="card-text text-muted" style="font-size: 14px;">{{ Str::limit($p->product_description, 60) }}</p>
                    <div class="d-flex gap-2">
                    <a href="{{ route('product.show', $p->product_id) }}" class="btn btn-primary flex-fill">Xem chi tiết</a>
                        <a href="javascript:void(0);" class="btn btn-warning flex-fill btn-add-cart" data-id="{{ $p->product_id }}">
                           <i class="fas fa-cart-plus"></i> Thêm giỏ
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@include('layouts.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

