<!DOCTYPE html>

<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cập nhật sản phẩm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-color: #f8f9fa;">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">

```
  <div class="card shadow-lg border-0">
    <div class="card-header bg-warning text-dark text-center">
      <h4 class="mb-0">Cập nhật sản phẩm</h4>
    </div>

    <div class="card-body">
      @foreach ($products as $product)
      <form action="/admin/xu-ly-cap-nhat-san-pham" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $product->product_id }}">
        <input type="hidden" name="img_old" value="{{ $product->product_img }}">

        <div class="mb-3">
          <label for="fname" class="form-label">Tên sản phẩm</label>
          <input type="text" id="fname" name="name" class="form-control" value="{{ $product->product_name }}" required>
        </div>

        <div class="mb-3">
          <label for="fprice" class="form-label">Giá</label>
          <input type="number" id="fprice" name="price" class="form-control" value="{{ $product->product_price }}" required>
        </div>

        <div class="mb-3">
          <label for="lcategory" class="form-label">Danh mục</label>
          <select id="lcategory" name="category" class="form-select" required>
            @foreach ($categories as $category)
              <option value="{{ $category->category_id }}" {{ $category->category_id == $product->product_category ? 'selected' : '' }}>
                {{ $category->category_name }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="limg" class="form-label">Ảnh sản phẩm</label>
          <input type="file" id="limg" name="img" class="form-control" accept="image/*" onchange="previewImage(event)">
          <div class="mt-3 text-center">
            <p class="text-muted mb-1">Ảnh hiện tại:</p>
            <img src="{{ asset('uploads/'.$product->product_img) }}" alt="Ảnh hiện tại" class="img-thumbnail mb-2" style="max-width: 200px;">
            <p class="text-muted mb-1">Ảnh xem trước:</p>
            <img id="preview" src="#" alt="Ảnh xem trước" style="max-width: 100%; display: none; border-radius: 8px;">
          </div>
        </div>

        <div class="mb-3">
          <label for="ldescription" class="form-label">Mô tả sản phẩm</label>
          <textarea id="ldescription" name="description" class="form-control" rows="5" required>{{ $product->product_description }}</textarea>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-warning text-dark fw-bold">Cập nhật sản phẩm</button>
        </div>
      </form>
      @endforeach
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

</body>
</html>
