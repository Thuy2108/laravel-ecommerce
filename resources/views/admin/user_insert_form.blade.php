@include('admin/template/header')

<div class="container mt-4">
    <h2 class="fw-bold mb-4">Thêm người dùng mới</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/admin/xu-ly-them-nguoi-dung') }}" method="POST" class="p-4 border rounded bg-light">
        @csrf

        <div class="mb-3">
            <label class="form-label">Tên đăng nhập</label>
            <input type="text" name="username" class="form-control" required value="{{ old('username') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Mật khẩu</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Họ và tên</label>
            <input type="text" name="fullname" class="form-control" required value="{{ old('fullname') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Địa chỉ</label>
            <input type="text" name="address" class="form-control" value="{{ old('address') }}">
        </div>

        <button type="submit" class="btn btn-primary">Thêm người dùng</button>
        <a href="{{ url('/admin/danh-sach-nguoi-dung') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>

@include('admin/template/footer')
