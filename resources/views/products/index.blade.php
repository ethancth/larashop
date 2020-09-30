@extends('layouts.app')
@section('title', 'Product')

@section('content')


    <div class="w3-content">
        <img class="mySlides" src="https://monkeymall.club/image/cache/catalog/Main%20Page%20Banner/BANNER-04-900x510.jpg" alt="custom_html_banner3" style="width:100%">
        <img class="mySlides" src="https://monkeymall.club/image/cache/catalog/BANNER-03%20New%201-900x510.jpg" alt="custom_html_banner3" style="width:100%">
        <img class="mySlides" src="https://monkeymall.club/image/cache/catalog/newslide/BANNER-01%20(1)%20(1)-900x510.jpg" alt="custom_html_banner4" style="width:100%">
        <img class="mySlides" src="https://monkeymall.club/image/cache/catalog/newslide/BANNER-02%20(1)%20(1)-900x510.jpg" alt="custom_html_banner4" style="width:100%">
        <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
        <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
    </div>
<div class="row">

<div class="col-lg-10 offset-lg-1">
<div class="card">
  <div class="card-body">
    <!-- 筛选组件开始 -->
    <form action="{{ route('products.index') }}" class="search-form">
      <div class="form-row">
        <div class="col-md-9">
          <div class="form-row">
            <div class="col-auto"><input type="text" class="form-control form-control-sm" name="search" placeholder="Search"></div>
            <div class="col-auto"><button class="btn btn-primary btn-sm">Search</button></div>
          </div>
        </div>
        <div class="col-md-3">
          <select name="order" class="form-control form-control-sm float-right">
            <option value="">Sort By</option>
            <option value="price_asc">Sort by Price: Low to low</option>
            <option value="price_desc">Sort by Price: High to Low</option>
              <option value="sold_count_asc">Sort by Sales from Low to High</option>
            <option value="sold_count_desc">Sort by Sales: High to Low</option>
            <option value="rating_desc">Sort by Rate: High to Low</option>
            <option value="rating_asc">Sort by Rate: Low to High</option>
          </select>
        </div>
      </div>
    </form>
    <!-- 筛选组件结束 -->
    <div class="row products-list">
      @foreach($products as $product)
        <div class="col-3 product-item">
          <div class="product-content">
            <div class="top">
              <div class="img">
                <a href="{{ route('products.show', ['product' => $product->id]) }}">
                  <img src="{{ $product->image_url }}" alt="">
                </a>
              </div>
              <div class="price"><b>RM </b>{{ $product->price }}</div>
              <div class="title">
                <a href="{{ route('products.show', ['product' => $product->id]) }}">{{ $product->title }}</a>
              </div>
            </div>
            <div class="bottom">
              <div class="sold_count">Total: <span>{{ $product->sold_count }}Sold </span></div>
              <div class="review_count">Review : <span>{{ $product->review_count }}</span></div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <div class="float-right">{{ $products->appends($filters)->render() }}</div>  <!-- 只需要添加这一行 -->
  </div>
</div>
</div>
</div>
<div>

    <div>
        <div class="owl-carousel owl-theme mt-5">
            <div class="item"><a href="" title="Main Banner  Car" target="_self">
                    <img class="responsive" src="https://monkeymall.club/image/catalog/demo/brands/b1.png" alt="Main Banner  Car">
                </a></div>
            <div class="item"><a href="index.php?route=common/home" title="Main Banner Mpoint" target="_self">
                    <img class="responsive" src="https://monkeymall.club/image/catalog/demo/brands/b2.png" alt="Main Banner Mpoint">
                </a></div>
            <div class="item"><a href="index.php?route=common/home" title="Main Banner Mpoint" target="_self">
                    <img class="responsive" src="https://monkeymall.club/image/catalog/demo/brands/b3.png" alt="Main Banner Mpoint">
                </a>
            </div>
            <div class="item"><a href="index.php?route=common/home" title="Main Banner Mpoint" target="_self">
                    <img class="responsive" src="https://monkeymall.club/image/catalog/demo/brands/b4.png" alt="Main Banner Mpoint">
                </a>
            </div>
            <div class="item"><a href="index.php?route=common/home" title="Main Banner Mpoint" target="_self">
                    <img class="responsive" src="https://monkeymall.club/image/catalog/demo/brands/b5.png" alt="Main Banner Mpoint">
                </a>
            </div>
            <div class="item"><a href="index.php?route=common/home" title="Main Banner Mpoint" target="_self">
                    <img class="responsive" src="https://monkeymall.club/image/catalog/demo/brands/b6.png" alt="Main Banner Mpoint">
                </a>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scriptsAfterJs')
<script>
  var filters = {!! json_encode($filters) !!};
  $(document).ready(function () {
    $('.search-form input[name=search]').val(filters.search);
    $('.search-form select[name=order]').val(filters.order);
    $('.search-form select[name=order]').on('change', function() {
      $('.search-form').submit();
    });
  })
</script>
@endsection
