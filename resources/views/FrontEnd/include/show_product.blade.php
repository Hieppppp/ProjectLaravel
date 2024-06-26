@extends('FrontEnd.master')
@section('title')
    Product
@endsection
@section('content')
<!-- Fruits Shop Start-->
    <div class="alert-container"></div>
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <h1 class="mb-4">Danh Sách Sản Phẩm</h1>
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="row g-4">
                            <div class="col-xl-3">
                                <form action="{{ route('show_product') }}" method="GET" class="input-group w-100 mx-auto d-flex">
                                    <input type="search" name="search" class="form-control p-3" placeholder="Tìm Kiếm" aria-describedby="search-icon-1">
                                    <button type="submit" class="btn btn-outline-secondary" id="search-icon-1"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-xl-3">
                                <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                                    <label for="fruits">Sắp Xếp:</label>
                                    <form action="">
                                        @csrf
                                        <select id="sort" name="sort" class="border-0 form-select-sm bg-light me-3" form="fruitform">
                                            <option value="{{Request::url()}}?sort_by=none">Sắp Xếp Theo</option>
                                            <option value="{{Request::url()}}?sort_by=tang_dan">Giá Tăng Dần</option>
                                            <option value="{{Request::url()}}?sort_by=giam_dan">Giá Giảm Dần</option>
                                            <option value="{{Request::url()}}?sort_by=kytu_az">Lọc Tên Từ A Đến Z</option>
                                            <option value="{{Request::url()}}?sort_by=kytuza">Lọc Tên Từ Z Đến A</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4">
                            <div class="col-lg-3">
                                <div class="row g-4">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4>Danh Mục Sản Phẩm</h4>
                                            <ul class="list-unstyled fruite-categorie">
                                                @foreach($categories as $category)
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="{{ route('show_product', ['category_id' => $category->category_id]) }}">{{ $category->category_name }}</a>
                                                        <span>{{ $category->order_number }}</span>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4 class="mb-2">Price</h4>
                                            <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput" min="0" max="500" value="0" oninput="amount.value=rangeInput.value">
                                            <output id="amount" name="amount" min-velue="0" max-value="500" for="rangeInput">0</output>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4>Additional</h4>
                                            <div class="mb-2">
                                                <input type="radio" class="me-2" id="Categories-1" name="Categories-1" value="Beverages">
                                                <label for="Categories-1"> Organic</label>
                                            </div>
                                            <div class="mb-2">
                                                <input type="radio" class="me-2" id="Categories-2" name="Categories-1" value="Beverages">
                                                <label for="Categories-2"> Fresh</label>
                                            </div>
                                            <div class="mb-2">
                                                <input type="radio" class="me-2" id="Categories-3" name="Categories-1" value="Beverages">
                                                <label for="Categories-3"> Sales</label>
                                            </div>
                                            <div class="mb-2">
                                                <input type="radio" class="me-2" id="Categories-4" name="Categories-1" value="Beverages">
                                                <label for="Categories-4"> Discount</label>
                                            </div>
                                            <div class="mb-2">
                                                <input type="radio" class="me-2" id="Categories-5" name="Categories-1" value="Beverages">
                                                <label for="Categories-5"> Expired</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <h4 class="mb-3">Sản Phẩm Nổi Bật</h4>
                                        @foreach($topProduct as $toppro)
                                        <div class="d-flex align-items-center justify-content-start">
                                            <div class="rounded me-4" style="width: 100px; height: 100px;">
                                                <img src="/product/{{$toppro->product_image}}" class="img-fluid rounded" alt="">
                                            </div>
                                            <div>
                                                <h6 class="mb-2"></h6>
                                                <div class="d-flex mb-2">
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h5 class="fw-bold me-2">2.99 $</h5>
                                                    <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="d-flex justify-content-center my-4">
                                            <a href="#" class="btn border border-secondary px-4 py-3 rounded-pill text-danger w-100">Vew More</a>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-12">
                                        <div class="position-relative">
                                            <img src="img/banner-fruits.jpg" class="img-fluid w-100 rounded" alt="">
                                            <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                                                <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row g-4 justify-content-center">
                                @foreach($products as $item)
                                        <div class="col-md-6 col-lg-6 col-xl-4">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="/product/{{$item->product_image}}" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                <!-- <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">{{$item->category_name}}</div> -->
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h6 class="d-inline-block text-danger">{{$item->product_name}}</h6>
                                                    <p class="d-inline-block text-truncate" style="max-width: 200px;">{!! Str::limit($item->product_detail,300) !!}</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap mb-2">
                                                        <p class="text-dark fs-5 fw-bold mb-0">₫{{$item->full_price}}.000</p>
                                                        <a href="#" class="btn border border-secondary rounded-pill px-3 text-danger add-to-cart" data-product-id="{{$item->product_id}}"><i class="fa fa-shopping-bag me-2 text-danger"></i> Chọn mua</a>

                                                    </div>
                                                    <div class="col-md-12 d-flex justify-content-end">
                                                        <button type="button" class="btn btn-info border border-secondary rounded-pill text-light flex-grow-1" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->product_id}}">
                                                            Chi Tiết
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$item->product_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{$item->product_name}}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-lg-8 col-xl-9">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="border rounded">
                                                                    <a href="#">
                                                                        <img src="/product/{{$item->product_image}}" class="img-fluid rounded" alt="Image">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <h4 class="fw-bold mb-3">{{$item->product_name}}</h4>
                                                                <p class="mb-3">Loại Sản Phẩm: {{$item->category_name}}</p>
                                                                <h5 class="fw-bold mb-3">₫{{$item->full_price}}.000</h5>
                                                                <div class="d-flex mb-4">
                                                                    <i class="fa fa-star text-secondary"></i>
                                                                    <i class="fa fa-star text-secondary"></i>
                                                                    <i class="fa fa-star text-secondary"></i>
                                                                    <i class="fa fa-star text-secondary"></i>
                                                                    <i class="fa fa-star"></i>
                                                                </div>
                                                                <p class="mb-4">{{$item->product_detail}}</p>
                                                                <div class="input-group quantity mb-5" style="width: 100px;">
                                                                    <div class="input-group-btn">
                                                                        <button class="btn btn-sm btn-minus rounded-circle bg-light border" >
                                                                            <i class="fa fa-minus"></i>
                                                                        </button>
                                                                    </div>
                                                                    <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                                                                    <div class="input-group-btn">
                                                                        <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                                                            <i class="fa fa-plus"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" name="product_id" value="{{$item->product_id}}">
                                                    <!-- <button type="submit" class="btn border border-secondary rounded-pill px-3 text-danger"><i class="fa fa-shopping-bag me-2 text-danger"></i> Add to cart</button> -->
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-danger add-to-cart" data-product-id="{{$item->product_id}}"><i class="fa fa-shopping-bag me-2 text-danger"></i> Chọn mua</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="col-12">
                                        <div class="pagination justify-content-center custom-pagination">
                                            {{ $products->links() }}
                                        </div>

                                       
                                    </div> 
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fruits Shop End-->
@endsection