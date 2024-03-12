<?php

namespace App\Http\Livewire;
use App\Models\Sale;
use App\Models\product;
use Livewire\Component;
use App\Models\category;
use App\Models\HomeSlider;
use App\Models\HomeCategory;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;

class HomeComponent extends Component
{
    // add product to wish-list
    public function addToWishlist($product_id, $product_name, $product_price){
        Cart::instance('wishlist')->add($product_id,$product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component','refreshComponent');
        
        session()->flash('message','Product has been added to the wishlist');
        return redirect()->route('product.wishlist');
    }

    public function store($product_id, $product_name, $product_price){
        Cart::instance('cart')->add($product_id,$product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added to the Cart');
        return redirect()->route('product.cart');
    }
    public function render(Request $request)
    {
        $sliders = HomeSlider::where('status',1)->get();
        
        $model = HomeSlider::where('status',1)->first();
        $visitor = Visitor::create([
            'visitable_type' => get_class($model),
            'visitable_id' => $model->id,
            'visitor_ip' => $request->ip(),
            'visited_at' => now(),
        ]);
        
        $lproducts = product::orderBy('created_at','DESC')->get()->take(8);
        $category = HomeCategory::find(1);
        $cats = explode(',',$category->sel_categories);
        $categories = category::whereIn('id',$cats)->get();
        $no_of_products = $category->no_of_products;
        // $sproducts = product::where('sale_price','>',0)->inRandomOrder()->get()->take(8);
        $sproducts = product::where('sale_price','>',0)->get()->take(8);
        $products = product::inRandomOrder()->get()->take(8);
        $sale = Sale::find(1);

        if(Auth::check()){
            Cart::instance('cart')->restore(Auth::user()->email);
            Cart::instance('wishlist')->restore(Auth::user()->email);
        }
        return view('livewire.home-component',['sliders'=>$sliders,'lproducts'=>$lproducts,'sproducts'=>$sproducts,'sale'=>$sale,'categories' => $categories,'no_of_products' =>$no_of_products, 'products'=>$products])->layout('layouts.home');
    }
}
