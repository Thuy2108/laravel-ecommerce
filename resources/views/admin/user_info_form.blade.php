@include('admin/template/header')

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">

```
  <div class="card shadow-lg border-0">
    <div class="card-header bg-success text-white text-center">
      <h4 class="mb-0">Cập nhật thông tin người dùng</h4>
    </div>

    <div class="card-body">
      @foreach ($users as $user)
      <form action="/admin/xu-ly-cap-nhat-nguoi-dung" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{ $user->user_id }}">

        <div class="mb-3">
          <label for="fname" class="form-label">Tên đăng nhập</label>
          <input type="text" id="fname" name="username" value="{{ $user->user_username }}" class="form-control" placeholder="Nhập tên đăng nhập..." required>
        </div>

        <div class="mb-3">
          <label for="lfullname" class="form-label">Họ và tên</label>
          <input type="text" id="lfullname" name="fullname" value="{{ $user->user_fullname }}" class="form-control" placeholder="Nhập họ tên..." required>
        </div>

        <div class="mb-3">
          <label for="laddress" class="form-label">Địa chỉ</label>
          <input type="text" id="laddress" name="address" value="{{ $user->user_address }}" class="form-control" placeholder="Nhập địa chỉ..." required>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-success">Lưu thay đổi</button>
        </div>
      </form>
      @endforeach
    </div>

    <div class="card-footer text-center text-muted small">
      &copy; {{ date('Y') }} - Quản trị người dùng
    </div>
  </div>

</div>
```

  </div>
</div>

@include('admin/template/footer')

