@include('layouts.header')

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
      <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white text-center">
          <h4 class="mb-0">Thêm sản phẩm mới</h4>
        </div>

```
    <div class="card-body">
      <form action="/admin/xu-ly-them-san-pham" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
          <label for="fname" class="form-label">Tên sản phẩm</label>
          <input type="text" id="fname" name="name" class="form-control" placeholder="Nhập tên sản phẩm..." required>
        </div>

        <div class="mb-3">
          <label for="fprice" class="form-label">Giá</label>
          <input type="number" id="fprice" name="price" class="form-control" placeholder="Nhập giá sản phẩm..." required>
        </div>

        <div class="mb-3">
          <label for="fimg" class="form-label">Ảnh sản phẩm</label>
          <input type="file" id="fimg" name="img" class="form-control" accept="image/*" onchange="previewImage(event)" required>
          <div class="mt-3 text-center">
            <img id="preview" src="#" alt="Ảnh xem trước" style="max-width: 100%; height: auto; display: none; border-radius: 8px;">
          </div>
        </div>

        <div class="mb-3">
          <label for="lcategory" class="form-label">Danh mục</label>
          <select id="lcategory" name="category" class="form-select" required>
            <option value="">-- Chọn danh mục --</option>
            @foreach ($categories as $category)
              <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="ldescription" class="form-label">Mô tả chi tiết</label>
          <textarea id="ldescription" name="description" class="form-control" rows="5" placeholder="Nhập mô tả sản phẩm..."></textarea>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
        </div>
      </form>
    </div>

    <div class="card-footer text-center text-muted small">
      &copy; {{ date('Y') }} - Quản trị sản phẩm
    </div>
  </div>
</div>
```

  </div>
</div>

<script>
function previewImage(event) {
  const preview = document.getElementById('preview');
  preview.src = URL.createObjectURL(event.target.files[0]);
  preview.style.display = 'block';
}
</script>

@include('layouts.footer')
