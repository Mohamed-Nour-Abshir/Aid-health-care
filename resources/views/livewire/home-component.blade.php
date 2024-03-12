<main class="main">
    @php
        $witems = Cart::instance('wishlist')->content()->pluck('id');
    @endphp
    <section class="home-slider position-relative pt-50">
        <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
            @foreach ($sliders as $slide)
                <div class="single-hero-slider single-animation-wrap">
                    <div class="container">
                        <div class="row align-items-center slider-animated-1">
                            <div class="col-lg-5 col-md-6">
                                <div class="hero-slider-content-2">
                                    <h4 class="animated">Trade-in offer</h4>
                                    <h2 class="animated fw-900">{{$slide->title}}</h2>
                                    <h1 class="animated fw-900 text-brand">{{$slide->subtitle}}</h1>
                                    <p class="animated">Buy with the cheapest price of 	৳{{$slide->price}} only</p>
                                    <a class="animated btn btn-brush btn-brush-3" href="{{$slide->link}}"> Shop Now </a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <div class="single-slider-img single-slider-img-1">
                                    <img class="animated slider-1-1" src="{{asset('assets/images/sliders')}}/{{$slide->image}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        
        </div>
        <div class="slider-arrow hero-slider-1-arrow"></div>
    </section>
    <section class="featured section-padding position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="assets/imgs/theme/icons/feature-1.png" alt="">
                        <h4 class="bg-1">Free Shipping</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="assets/imgs/theme/icons/feature-2.png" alt="">
                        <h4 class="bg-3">Online Order</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="assets/imgs/theme/icons/feature-3.png" alt="">
                        <h4 class="bg-2">Save Money</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="assets/imgs/theme/icons/feature-4.png" alt=""> 
                        <h4 class="bg-4">Promotions</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="assets/imgs/theme/icons/feature-5.png" alt="">
                        <h4 class="bg-5">Happy Sell</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="assets/imgs/theme/icons/feature-6.png" alt="">
                        <h4 class="bg-6">24/7 Support</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product-tabs section-padding position-relative wow fadeIn animated">
        <div class="bg-square"></div>
        <div class="container">
            <div class="tab-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Featured</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two" type="button" role="tab" aria-controls="tab-two" aria-selected="false">Popular</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-three" data-bs-toggle="tab" data-bs-target="#tab-three" type="button" role="tab" aria-controls="tab-three" aria-selected="false">New added</button>
                    </li>
                </ul>
                <a href="#" class="view-more d-none d-md-flex">View More<i class="fi-rs-angle-double-small-right"></i></a>
            </div>
            <!--End nav-tabs-->
            <div class="tab-content wow fadeIn animated" id="myTabContent">

                {{-- featured    --}}
                <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                    <div class="row product-grid-4">
                        @foreach ($products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{route('product.details',['slug'=>$product->slug])}}">
                                            <img class="default-img" src="{{asset('assets/images/products')}}/{{$product->image}}" alt="">
                                            <img class="hover-img" src="{{asset('assets/images/products')}}/{{$product->image}}" alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up" href="{{route('product.details',['slug'=>$product->slug])}}"><i class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#" wire:click.prevent="addToWishlist('{{$product->id}}','{{$product->name}}','{{$product->sale_price}}')"><i class="fi-rs-heart"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="new">featured</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="{{url('shop')}}">{{$product->category->name}}</a>
                                    </div>
                                    <h2><a href="{{route('product.details',['slug'=>$product->slug])}}">{{$product->name}}</a></h2>
                                    <div class="rating-result" title="availability">
                                        <span>
                                            <span>{{$product->stock_status}}</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span> ৳{{$product->sale_price}}</span>
                                        <span class="old-price"> ৳{{$product->regular_price}}</span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up" href="" wire:click.prevent="store('{{$product->id}}','{{$product->name}}','{{$product->sale_price}}')"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab one (Featured)-->

                {{-- popular  --}}
                <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                    <div class="row product-grid-4">
                        @php
                            $c_products = DB::table('products')->get()->take(8);
                        @endphp
                        @foreach ($c_products as $cproduct)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{route('product.details',['slug'=>$cproduct->slug])}}">
                                                <img class="default-img" src="{{asset('assets/images/products')}}/{{$cproduct->image}}" alt="">
                                                <img class="hover-img" src="{{asset('assets/images/products')}}/{{$cproduct->image}}" alt="">
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up" href="{{route('product.details',['slug'=>$cproduct->slug])}}"><i class="fi-rs-eye"></i></a>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="" wire:click.prevent="addToWishlist('{{$cproduct->id}}','{{$cproduct->name}}','{{$cproduct->sale_price}}')"><i class="fi-rs-heart"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">popular</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            {{-- <a href="{{url('shop')}}">{{$cproduct->category->name}}</a> --}}
                                        </div>
                                        <h2><a href="{{route('product.details',['slug'=>$cproduct->slug])}}">{{$cproduct->name}}</a></h2>
                                        <div class="rating-result" title="availability">
                                            <span>
                                                <span>{{$cproduct->stock_status}}</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            <span> ৳{{$cproduct->sale_price}}</span>
                                            <span class="old-price"> ৳{{$cproduct->regular_price}}</span>
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="" wire:click.prevent="store('{{$cproduct->id}}','{{$cproduct->name}}','{{$cproduct->sale_price}}')"><i class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab two (Popular)-->

                {{-- new added --}}
                <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
                    <div class="row product-grid-4">
                        @foreach ($lproducts as $lproduct)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{route('product.details',['slug'=>$lproduct->slug])}}">
                                                <img class="default-img" src="{{asset('assets/images/products')}}/{{$lproduct->image}}" alt="">
                                                <img class="hover-img" src="{{asset('assets/images/products')}}/{{$lproduct->image}}" alt="">
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up" href="{{route('product.details',['slug'=>$lproduct->slug])}}"><i class="fi-rs-eye"></i></a>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="" wire:click.prevent="addToWishlist('{{$lproduct->id}}','{{$lproduct->name}}','{{$lproduct->sale_price}}')"><i class="fi-rs-heart"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="new">New</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="{{url('shop')}}">{{$lproduct->category->name}}</a>
                                        </div>
                                        <h2><a href="{{route('product.details',['slug'=>$lproduct->slug])}}">{{$lproduct->name}}</a></h2>
                                        <div class="rating-result" title="availability">
                                            <span>
                                                <span>{{$lproduct->stock_status}}</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            <span> ৳{{$lproduct->sale_price}}</span>
                                            <span class="old-price"> ৳{{$lproduct->regular_price}}</span>
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="" wire:click.prevent="store('{{$lproduct->id}}','{{$lproduct->name}}','{{$lproduct->sale_price}}')"><i class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                        
                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab three (New added)-->

            </div>
            <!--End tab-content-->
        </div>
    </section>

    <section class="popular-categories section-padding mt-15 mb-25">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>Popular</span> Categories</h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows"></div>
                <div class="carausel-6-columns" id="carausel-6-columns">
                    @foreach ($categories as $key=>$category)
                    <div class="card-1">
                        <figure class=" img-hover-scale overflow-hidden">
                            <a href="{{url('shop')}}"><img src="assets/imgs/shop/category-thumb-1.jpg" alt=""></a>
                        </figure>
                        <h5><a href="{{url('shop')}}">{{$category->name}}</a></h5>
                    </div>
                    @endforeach
                    

                </div>
            </div>
        </div>
    </section>
    
    <section class="section-padding">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>New</span> Arrivals</h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows"></div>
                <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                   @foreach ($products as $product)
                        <div class="product-cart-wrap small hover-up">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="product-details.html">
                                        <img class="default-img" src="{{asset('assets/images/products')}}/{{$product->image}}" alt="">
                                        <img class="hover-img" src="{{asset('assets/images/products')}}/{{$product->image}}" alt="">
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Quick view" class="action-btn small hover-up" href="{{route('product.details',['slug'=>$product->slug])}}">
                                        <i class="fi-rs-eye"></i></a>
                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="" wire:click.prevent="addToWishlist('{{$product->id}}','{{$product->name}}','{{$product->sale_price}}')" tabindex="0"><i class="fi-rs-heart"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">new</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <h2><a href="product-details.html">{{$product->name}}</a></h2>
                                <div class="rating-result" title="90%">
                                    <span>
                                    </span>
                                </div>
                                <div class="product-price">
                                    <span>৳{{$product->sale_price}} </span>
                                    <span class="old-price">৳{{$product->regular_price}}</span>
                                </div>
                            </div>
                        </div>
                   @endforeach
                    
                    
                </div>
            </div>
        </div>
    </section>
    
    
</main>