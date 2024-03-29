<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
                <span></span> Shop
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="shop-product-fillter">
                        {{-- <div class="totall-product">
                            <p> We found <strong class="text-brand">688</strong> items for you!</p>
                        </div> --}}
                        <div class="sort-by-product-area">
                            <div class="sort-by-cover mr-10">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps"></i>Show:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <select name="post-per-page" class="ort-by-dropdown" wire:model="pageSize">
                                            <option value="12" selected="selected">12 per page</option>
                                            <option value="16">16 per page</option>
                                            <option value="18">18 per page</option>
                                            <option value="21">21 per page</option>
                                            <option value="24">24 per page</option>
                                            <option value="30">30 per page</option>
                                            <option value="32">32 per page</option>
                                        </select>
                                        {{-- <span> 50 <i class="fi-rs-angle-small-down"></i></span> --}}
                                    </div>
                                </div>
                            
                            </div>
                            <div class="sort-by-cover">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <select name="orderby" class="use-chosen" wire:model="sorting">
                                            <option value="default" selected="selected">Default sorting</option>
                                            <option value="date">newness</option>
                                            <option value="price">price: low to high</option>
                                            <option value="price-desc">price: high to low</option>
                                        </select>
                                        {{-- <span> Featured <i class="fi-rs-angle-small-down"></i></span> --}}
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    {{-- <ul>
                                        <li><a class="active" href="#">Featured</a></li>
                                        <li><a href="#">Price: Low to High</a></li>
                                        <li><a href="#">Price: High to Low</a></li>
                                        <li><a href="#">Release Date</a></li>
                                        <li><a href="#">Avg. Rating</a></li>
                                    </ul> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row product-grid-3">
                        @php
                            $witems = Cart::instance('wishlist')->content()->pluck('id');
                        @endphp
                         @foreach ($products as $product)
                            <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{route('product.details',['slug'=>$product->slug])}}">
                                                <img class="default-img" src="{{asset('assets/images/products')}}/{{$product->image}}" alt="">
                                                <img class="hover-img" src="{{asset('assets/images/products')}}/{{$product->image}}" alt="">
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up" href="{{route('product.details',['slug'=>$product->slug])}}">
                                                {{-- <i class="fi-rs-search"></i></a> --}}
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#" wire:click.prevent="addToWishlist('{{$product->id}}','{{$product->name}}','{{$product->sale_price}}')"><i class="fi-rs-heart"></i></a>
                                            {{-- <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a> --}}
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            {{-- <span class="hot">Hot</span> --}}
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="/shop">{{$product->category->name}}</a>
                                        </div>
                                        <h2><a href="{{route('product.details',['slug'=>$product->slug])}}">{{$product->name}}</a></h2>
                                        <div class="rating-result" title="90%">
                                        <span>
                                            <span>{{$product->stock_status}}</span>
                                        </span>
                                        </div>
                                        <div class="product-price">
                                            <span>৳{{$product->sale_price}} </span>
                                            <span class="old-price">৳{{$product->regular_price}}</span>
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="#" wire:click.prevent="store('{{$product->id}}','{{$product->name}}','{{$product->regular_price}}')"><i class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <!--pagination-->
                    <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                {{$products->links()}}
                                {{-- <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                <li class="page-item"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                                <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">16</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="fi-rs-angle-double-small-right"></i></a></li> --}}
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    <div class="row">
                        <div class="col-lg-12 col-mg-6"></div>
                        <div class="col-lg-12 col-mg-6"></div>
                    </div>
                    <div class="widget-category mb-30">
                        <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
                        <ul class="categories">
                            @foreach ($categories as $category)
                                <li><a href="/shop">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Fillter By Price -->
                    <div class="sidebar-widget price_range range mb-30">
                        <div class="widget-header position-relative mb-20 pb-10">
                            <h5 class="widget-title mb-10">Fill by price</h5>
                            <div class="bt-1 border-color-1"></div>
                        </div>

                        <div class="price-filter">
                            <div class="price-filter-inner">
                                <div id="slider-range" wire:ignore></div>
                                <div class="price_slider_amount">
                                    <div class="label-input">
                                        <span>Range:</span><input type="text" id="amount" name="price" placeholder="Add Your Price">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        
                        
                    </div>
                    
                    <!-- Product sidebar Widget -->
                    <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                        <div class="widget-header position-relative mb-20 pb-10">
                            <h5 class="widget-title mb-10">New products</h5>
                            <div class="bt-1 border-color-1"></div>
                        </div>
                        @foreach ($popular_products as $p_products)
                            <div class="single-post clearfix">
                                <div class="image">
                                    <img src="{{asset('assets/images/products')}}/{{$p_products->image}}" alt="{{$p_products->name}}">
                                </div>
                                <div class="content pt-10">
                                    <h5><a href="{{route('product.details',['slug'=>$p_products->slug])}}">{{$p_products->name}}</a></h5>
                                    <p class="price mb-0 mt-5">৳{{$p_products->regular_price}}</p>
                                    <div class="product-rate">
                                        <div class="product-rating" style="width:90%"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    {{-- <div class="banner-img wow fadeIn mb-45 animated d-lg-block d-none">
                        <img src="assets/imgs/banner/banner-11.jpg" alt="">
                        <div class="banner-text">
                            <span>Women Zone</span>
                            <h4>Save 17% on <br>Office Dress</h4>
                            <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
</main>


@push('scripts')
    <script>
        @if ($min_price && $max_price)
    var minPrice = {{ $min_price }};
    var maxPrice = {{ $max_price }};
@else
    var minPrice = 130; // default minimum price
    var maxPrice = 10000; // default maximum price
@endif

$(document).ready(function() {
    $("#slider-range").slider({
        range: true,
        min: 0,
        max: 500,
        values: [minPrice, maxPrice],
        slide: function(event, ui) {
            $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);

            // Emit Livewire event with updated values
            Livewire.emit('priceRangeUpdated', ui.values[0], ui.values[1]);
        }
    });

    $("#amount").val("$" + $("#slider-range").slider("values", 0) +
        " - $" + $("#slider-range").slider("values", 1));
});

    </script>
@endpush