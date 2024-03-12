<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow">Home</a>
                <span></span> Shop
                <span></span> Your Cart
            </div>
        </div>
    </div>

    <section class="mt-50 mb-50">
        <div class="container">
            {{-- @if (Cart::instance('cart')->count() > 0) --}}
            <div class="row">
                @if (Session::has('success_message'))
                  <div class="alert-success cart-style">
                      <strong>Success</strong> {{Session::get('success_message')}}
                  </div>
                @endif
                
                <div class="col-12">
                    @if (Cart::instance('cart')->count() > 0)
                        <div class="table-responsive">
                            @if (Cart::instance('cart')->count() > 0)
                            <table class="table shopping-summery text-center clean">
                                <thead>
                                    <tr class="main-heading">
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Subtotal</th>
                                        <th scope="col">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Cart::instance('cart')->content() as $item)
                                        <tr>
                                            <td class="image product-thumbnail"><img src="{{asset('assets/images/products')}}/{{$item->model->image}}" alt="{{$item->model->name}}" alt="#"></td>
                                            <td class="product-des product-name">
                                                <h5 class="product-name"><a href="{{route('product.details',['slug'=>$item->model->slug])}}">{{$item->model->name}}</a></h5>
                                                <p class="font-xs">{{$item->model->short_description}}
                                                </p>
                                            </td>
                                            <td class="price" data-title="Price"><span>৳{{$item->model->sale_price}}</span></td>
                                            <td class="text-center" data-title="Stock">
                                                <div class="detail-qty border radius  m-auto">
                                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                                    <span class="qty-val">{{$item->qty}}</span>
                                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                                </div>
                                            </td>
                                            <td class="text-right" data-title="Cart">
                                                <span>৳{{$item->subtotal}} </span>
                                            </td>
                                            <td class="action" data-title="Remove"><a href="#" wire:click.prevent="destroy('{{$item->rowId}}')" class="text-muted"><i class="fi-rs-trash"></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="cart-action text-end">
                                <a class="btn  mr-10 mb-sm-15" href="#" wire:click.prevent="switchSaveLater('{{$item->rowId}}')"><i class="fi-rs-download mr-10"></i>Save For Later</a>
                                <a class="btn " href="{{url('shop')}}"><i class="fi-rs-shopping-bag mr-10"></i>Continue Shopping</a>
                            </div>
                            @else
                            <p>No item in Cart</p>
                            @endif
                        </div>
                    
                        <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-25">
                                    <h4>Billing Details</h4>
                                </div>
                                <form wire:submit.prevent="placeOrder" onsubmit="$('#processing').show();">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Full name *" wire:model="lastname" class="@error('lastname') invalid @enderror">
                                        @error('lastname') <span class="text-danger"> {{$message}}</span> @enderror
                                    </div>
            
                                    <div class="form-group">
                                        <input type="text" placeholder="Phone number *" class="@error('mobile') invalid @enderror" wire:model="mobile">
                                        @error('mobile') <span class="text-danger"> {{$message}}</span> @enderror
                                    </div>

                                    <div class="payment_method">
                                        <div class="mb-15">
                                            <h5>Delivery Option</h5>
                                        </div>
                                        <div class="payment_option">
                                            <div class="custome-radio">
                                                <input class="form-check-input" type="radio" name="payment_option" checked value="60" id="exampleRadios3" wire:model="delivery_price">
                                                <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse" data-target="#cashOnDelivery" aria-controls="cashOnDelivery">৳60 Inside Dhaka</label>                                        
                                            </div>
                                            <div class="custome-radio">
                                                <input class="form-check-input" type="radio" value="100" name="payment_option" id="exampleRadios5" wire:model="delivery_price">
                                                <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">৳100 Outside Dhaka</label>                                        
                                            </div>
                                        </div>
                                        @error('delivery_price') <span class="text-danger"> {{$message}}</span> @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="text" placeholder="Address *" class="@error('line1') invalid @enderror" wire:model="line1">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="@error('country') invalid @enderror" placeholder="Country / State *" wire:model="country">
                                        @error('country') <span class="text-danger"> {{$message}}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="City / Town *" class="@error('city') invalid @enderror" wire:model="city">
                                        @error('city') <span class="text-danger"> {{$message}}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="zipcode" placeholder="Postcode / ZIP *" class="@error('zipcode') invalid @enderror" wire:model="zipcode">
                                        @error('zipcode') <span class="text-danger"> {{$message}}</span> @enderror
                                    </div>
                                    @if ($errors->isEmpty())
                                        <div wire:ignore id="processing" style="font-size:22px;margin-bottom:20px; padding-left:37px; color:green; display:none;">
                                        <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                        <span>Processing....</span>
                                        </div>
                                    @endif
                                    <style>
                                        .place{
                                            background: #F15412;
                                        }
                                    </style>
                                    <button class="btn btn-fill-out btn-block form-control mt-15 mb-10 place">Place Order</button>
                                    
                                </form>
                            </div>
                            <div class="col-md-6">
                                <div class="order_review">
                                    <div class="mb-20">
                                        <h4>Order Summary</h4>
                                    </div>
                                    <div class="table-responsive order_table text-center">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">Product</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="image product-thumbnail"><img src="{{asset('assets/images/products')}}/{{$item->model->image}}" alt="#"></td>
                                                    <td>
                                                        <h5><a href="{{route('product.details',['slug'=>$item->model->slug])}}">{{$item->model->name}}</a></h5> <span class="product-qty">x {{$item->qty}}</span>
                                                    </td>
                                                    <td>৳{{$item->model->sale_price}}</td>
                                                </tr>
                                                <tr>
                                                    <th>SubTotal</th>
                                                    <td class="product-subtotal" colspan="2">৳{{Cart::instance('cart')->subtotal()}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Shipping</th>
                                                    <td colspan="2"><em>৳{{number_format($delivery_price,2)}}</em></td>
                                                </tr>
                                                <tr>
                                                    <th>Total</th>
                                                    <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">৳{{ number_format(Cart::instance('cart')->subtotal() + $delivery_price,2)}}</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <p style="font-style: italic;">Payment will be cash on delivery</p>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                    {{-- <div class="payment_method">
                                        <div class="mb-25">
                                            <h5>Payment</h5>
                                        </div>
                                        <div class="payment_option">
                                            <div class="custome-radio">
                                                <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios3">
                                                <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse" data-target="#cashOnDelivery" aria-controls="cashOnDelivery">Cash On Delivery</label>                                        
                                            </div>
                                            <div class="custome-radio">
                                                <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios4">
                                                <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#cardPayment" aria-controls="cardPayment">Card Payment</label>                                        
                                            </div>
                                            <div class="custome-radio">
                                                <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios5">
                                                <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">Paypal</label>                                        
                                            </div>
                                        </div>
                                    </div> --}}
                                    
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="text-center" style="padding:30px 0px">
                            <h1>Your cart is empty!</h1>
                            <p>Add Items to it now</p>
                            <a href="/shop" class="btn btn-success">Shop Now</a>
                        </div>
                    @endif

                    <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                    <div class="row mb-50">
                        <div class="col-lg-6 col-md-12">
                            
                             {{-- save for later  --}}
                            <div class="wrap-iten-in-cart">
                                <div class="heading_s1 mb-3">
                                    <h4 class="title-box" style="border-bottom: 1px solid; padding-bottom:15px;">{{Cart::instance('saveForLater')->count()}} item(s) Saved For Later</h4>
                                </div>
                                @if (Session::has('s_success_message'))
                                <div class="alert-success cart-style">
                                    <strong>Success</strong> {{Session::get('s_success_message')}}
                                </div>
                                @endif
                                @if (Cart::instance('saveForLater')->count() > 0)
                                <ul class="products-cart">
                                    @foreach (Cart::instance('saveForLater')->content() as $item)
                                    <li class="pr-cart-item">
                                        <div class="product-image">
                                            <figure><img src="{{asset('assets/images/products')}}/{{$item->model->image}}" alt="{{$item->model->name}}" width="100" height="100"></figure>
                                        </div>
                                        <div class="product-name">
                                            <a class="link-to-product" href="{{route('product.details',['slug'=>$item->model->slug])}}">{{$item->model->name}}</a>
                                        </div>
                                        <div class="price-field produtc-price"><p class="price"><span class="text-danger">&#2547;</span>{{$item->model->regular_price}}</p></div>
                                        <div class="quantity">
                                            {{-- <p class="text-center"><a href="#" wire:click.prevent="moveToCart('{{$item->rowId}}')">Move To Cart</a></p> --}}
                                        </div>
                                        <div class="delete">
                                            <a href="#" wire:click.prevent="deleteFromSaveLater('{{$item->rowId}}')" class="btn btn-delete" title="">
                                                <i class="fi-rs-trash" aria-hidden="true"></i>
                                                <span>Delete from Saved Later</span>
                                            </a>
                                            <a href="#" wire:click.prevent="moveToCart('{{$item->rowId}}')" class="btn btn-delete" title="">
                                                <i class="fi-rs-download" aria-hidden="true"></i>
                                                <span>Move To Cart</span>
                                            </a>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                @else
                                <p>No item Saved For Later</p>
                                @endif
                            </div>

                        </div>
                        
                        <div class="col-lg-6 col-md-12">
                            <div class="border p-md-4 p-30 border-radius cart-totals">
                                <div class="heading_s1 mb-3">
                                    <h4>Most viewed Products</h4>
                                </div>
                                <div class="row related-products">
                                    @foreach ($popular_products as $r_products)
                                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                            <div class="product-cart-wrap small hover-up mb-0">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="{{route('product.details',['slug'=>$r_products->slug])}}" tabindex="0">
                                                            <img class="default-img" src="{{asset('assets/images/products')}}/{{$r_products->image}}" alt="{{$r_products->name}}">
                                                            <img class="hover-img" src="{{asset('assets/images/products')}}/{{$r_products->image}}" alt="{{$r_products->name}}">
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a href="{{route('product.details',['slug'=>$r_products->slug])}}" aria-label="Quick view" class="action-btn small hover-up"><i class="fi-rs-search"></i></a>
                                                        {{-- <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="" tabindex="0"><i class="fi-rs-heart"></i></a> --}}
                                                        {{-- <a aria-label="Compare" class="action-btn small hover-up" href="compare.php" tabindex="0"><i class="fi-rs-shuffle"></i></a> --}}
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="hot">popular</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <h2><a href="{{route('product.details',['slug'=>$r_products->slug])}}" tabindex="0">{{$r_products->name}}</a></h2>
                                                    <div class="rating-result" title="90%">
                                                        <span>
                                                        </span>
                                                    </div>
                                                    <div class="product-price">
                                                        <span>৳{{$r_products->sale_price}} </span>
                                                        <span class="old-price">৳{{$r_products->regular_price}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                {{-- <a href="checkout.html" class="btn "> <i class="fi-rs-box-alt mr-10"></i> Proceed To CheckOut</a> --}}
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
