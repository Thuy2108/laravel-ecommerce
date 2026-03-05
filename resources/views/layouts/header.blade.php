<!DOCTYPE html>
<html lang="en">
<head>
  <title>Laravel Bootstrap 5 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .fakeimg {
      height: 200px;
      background: #aaa;
    }
  </style>
</head>
<body>

<div class="p-4 text-white text-center" 
     style="
        background-image: url('/img/nen.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
     ">
    <h1><span class="fw-bold">2TF</span> - Thế giới di động điện tử</h1>
    <p>Chào mừng đến với thế giới viễn thông 2TF</p> 
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid container">
        <a class="navbar-brand fw-bold fs-4 me-4" href="/">2TF</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <form class="d-flex mx-auto w-50" role="search">
                <input class="form-control me-2" type="search" placeholder="Tìm kiếm sản phẩm, thương hiệu..." aria-label="Search">
                <button class="btn btn-outline-light" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('product-list') ? 'active' : '' }}" href="/product-list">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cart">
                       <i class="fas fa-shopping-cart"></i> Giỏ hàng 
                       (<span id="cart-count">{{ count(session('cart.products', [])) }}</span>)
                    </a>
                </li>
                @if(session('user_name'))
                    @if(session('user_role') == 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/danh-sach-nguoi-dung">Admin Panel</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Đăng xuất ({{ session('user_name') }})</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('login') ? 'active' : '' }}" href="/login">
                            <i class="fas fa-user"></i> Đăng nhập
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function(){
    document.querySelectorAll('.btn-add-cart').forEach(function(button){
        button.addEventListener('click', function(){
            let id = this.dataset.id;

            fetch('/cart/add/' + id, {
                method: 'GET',
                credentials: 'include'
            })
                .then(response => response.json())
                .then(data => {
                    if(data.success){
                        // Cập nhật số sản phẩm khác nhau trên header
                        let cartCountElem = document.getElementById('cart-count');
                        if(cartCountElem){
                            cartCountElem.textContent = data.cart_count;
                        }
                        alert('Đã thêm sản phẩm vào giỏ hàng!');
                    } else {
                        alert('Có lỗi xảy ra!');
                    }
                })
                .catch(err => console.error(err));
        });
    });
});
</script>

</body>
</html>
