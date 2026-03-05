@include('layouts/header')
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 
</head>
<body>
<div class="container mt-5" style="max-width: 400px;">
  <h3 class="text-center mb-4">Đăng nhập</h3>
  
  <!-- Hiển thị thông báo lỗi nếu có -->
  @if(session('error'))
    <div class="alert alert-danger">
      {{ session('error') }}
    </div>
  @endif
  
  <form action="{{ route('act_login') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Tên đăng nhập</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
      @error('name')
        <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="pswd" class="form-label">Mật khẩu</label>
      <input type="password" class="form-control" id="pswd" name="pswd" required>
      @error('pswd')
        <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
  </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@include('layouts.footer')
