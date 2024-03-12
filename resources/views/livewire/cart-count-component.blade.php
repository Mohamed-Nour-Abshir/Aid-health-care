{{-- <div class="header-action-icon-2">
    <a class="mini-cart-icon" href="{{url('/cart')}}">
        <img alt="Surfside Media" src="{{asset('assets/imgs/theme/icons/icon-cart.svg')}}">
        @if (Cart::instance('cart')->count() > 0)
            <span pro-count blue>{{Cart::instance('cart')->count()}}</span>
        @endif
    </a>
</div> --}}

<div class="header-action-icon-2">
    <a class="mini-cart-icon" href="{{url('/cart')}}">
        <img alt="Surfside Media" src="{{asset('assets/imgs/theme/icons/icon-cart.svg')}}">
        @if (Cart::instance('cart')->count() > 0)
            <span class="pro-count blue">{{Cart::instance('cart')->count()}}</span>
        @endif
    </a>
</div>