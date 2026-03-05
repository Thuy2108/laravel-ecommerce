<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Panel - Laravel Bootstrap 5</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<!-- Banner -->
<div class="p-5 bg-primary text-white text-center">
  <h1>Admin Panel - Thế giới di động điện tử</h1>
  <p>Chào mừng đến với trang quản trị của 2TF</p> 
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="/">2TF</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('admin/danh-sach-nguoi-dung') ? 'active' : '' }}" href="/admin/danh-sach-nguoi-dung">Người dùng</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('admin/danh-sach-san-pham') ? 'active' : '' }}" href="/admin/danh-sach-san-pham">Sản phẩm</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}">Đăng xuất</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

