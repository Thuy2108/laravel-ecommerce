<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Trang chủ' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            background: #f9fafc;
        }

        /* ===== BANNER SLIDER ===== */
        .home-slider {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        .home-slider img {
            height: 380px;
            object-fit: cover;
        }
/* 
        .carousel-caption {
            background: rgba(0,0,0,0.45);
            border-radius: 12px;
            padding: 20px 30px;
            height: 90%;
            width: 80%;
        } */

        /* .carousel-caption h2 {
            font-weight: 800;
        } */

        /* ===== PRODUCT ===== */
        .card {
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.12);
        }

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

<!-- ===== BANNER SLIDER ===== -->
<div class="container mt-4">
    <div id="homeSlider" class="carousel slide home-slider" data-bs-ride="carousel">

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#homeSlider" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#homeSlider" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#homeSlider" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="/img/banner1.png" class="d-block w-100" alt="Banner 1">
                <div class="carousel-caption text-start">
                    <a href="#products" class="btn btn-warning fw-bold">Mua ngay</a>
                </div>
            </div>  Z

            <div class="carousel-item">
                <img src="/img/banner2.png" class="d-block w-100" alt="Banner 2">
                <div class="carousel-caption">
                    <a href="#products" class="btn btn-primary fw-bold">Xem ngay</a>
                </div>
            </div>

            <div class="carousel-item">
                <img src="/img/banner3.png" class="d-block w-100" alt="Banner 3">
                <div class="carousel-caption text-end">
                    <a href="#products" class="btn btn-success fw-bold">Khám phá</a>
                </div>
            </div>

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#homeSlider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#homeSlider" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div>

<!-- ===== PRODUCT LIST ===== -->
<div class="container mt-5" id="products">
    <h2 class="text-center mb-4 fw-bold">Sản phẩm mới nhất</h2>

    <div class="row">
        @foreach ($products as $p)
        <div class="col-md-3 mb-4">
            <div class="card h-100 shadow-sm">
                @if($p->product_img)
                    <img src="/{{ $p->product_img }}" class="card-img-top"
                         style="height:200px; object-fit:cover;">
                @else
                    <div class="w-100 d-flex align-items-center justify-content-center bg-secondary text-white"
                         style="height:200px;">
                        No Image
                    </div>
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{ $p->product_name }}</h5>
                    <p class="text-danger fw-bold">
                        {{ number_format($p->product_price, 0, ',', '.') }}₫
                    </p>
                    <p class="text-muted" style="font-size:14px;">
                        {{ Str::limit($p->product_description, 60) }}
                    </p>

                    <div class="d-flex gap-2">
                        <a href="{{ route('product.show', $p->product_id) }}"
                           class="btn btn-primary flex-fill">
                            Xem chi tiết
                        </a>
                        <a href="javascript:void(0);"
                           class="btn btn-warning flex-fill btn-add-cart"
                           data-id="{{ $p->product_id }}">
                            <i class="fas fa-cart-plus"></i> Thêm giỏ
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@include('layouts.footer', ['class' => 'footer-custom'])

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
