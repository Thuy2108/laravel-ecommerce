@include('layouts.header')

<div class="container mt-5">
  <h3 class="text-center mb-4">Danh mục chủ đề</h3>

  <div class="row">
    @foreach ($categories as $category)
    <div class="col-md-4 mb-4">
      <div class="card shadow-sm h-100 border-0">
        <div class="card-body text-center">
          <h5 class="card-title text-primary fw-bold">{{ $category->category_name }}</h5>
          <a href="{{ url('san-pham?category='.$category->category_id) }}" class="btn btn-outline-primary">
            Xem sản phẩm
          </a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@include('layouts.footer')
