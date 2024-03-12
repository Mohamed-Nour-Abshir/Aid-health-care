<main id="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow">Home</a>
                <span></span> Shop
                <span></span> Wishlist
            </div>
        </div>
    </div>
    <div class="container">
        @if (Session::has('message'))
            <div class="alert-success cart-style">
                <strong>Success</strong> {{Session::get('message')}}
            </div>
        @endif
        
       <div class="row">
        @if(Cart::instance('wishlist')->content()->count() > 0)
        <div class="row">
            @foreach (Cart::instance('wishlist')->content() as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                    <div class="product-cart-wrap mb-30">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="{{route('product.details',['slug'=>$item->model->slug])}}">
                                    <img class="default-img" src="{{asset('assets/images/products')}}/{{$item->model->image}}" alt="">
                                    <img class="hover-img" src="{{asset('assets/images/products')}}/{{$item->model->image}}" alt="">
                                </a>
                            </div>
                            <div class="product-action-1">
                                <a aria-label="Quick view" class="action-btn hover-up" href="{{route('product.details',['slug'=>$item->model->slug])}}"><i class="fi-rs-eye"></i></a>
                                <a aria-label="Remove Product from Wishlist" class="action-btn hover-up" href="#" wire:click.prevent="removeFromWishlist('{{$item->model->id}}')"><i class="fi-rs-heart"></i></a>
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="hot">Loved</span>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            {{-- <div class="product-category">
                                <a href="{{url('shop')}}">{{$item->category->name}}</a>
                            </div> --}}
                            <h2><a href="{{route('product.details',['slug'=>$item->model->slug])}}">{{$item->name}}</a></h2>
                            <div class="rating-result" title="availability">
                                <span>
                                    <span>{{$item->stock_status}}</span>
                                </span>
                            </div>
                            <div class="product-price">
                                <span> ৳{{$item->model->sale_price}}</span>
                                <span class="old-price"> ৳{{$item->model->regular_price}}</span>
                            </div>
                            <div class="product-action-1 show">
                                
                                <a aria-label="Move To Cart" class="action-btn hover-up" href="" wire:click.prevent="moveProductFromWishlistToCart('{{$item->rowId}}')"><i class="fi-rs-shopping-bag-add"></i></a>
                            </div>
                           
                            
                        </div>
                        
                    </div>
                    
                </div>
                
            @endforeach
        </div>
           
        @else
        <div class="text-center" style="padding:30px 0px">
            <h1>No Items In The Wishlist!</h1>
            <p>Add Items to it now</p>
            <a href="/shop" class="btn btn-success">Shop Now</a>
        </div>
        @endif
       </div>
    </div>
</main>
