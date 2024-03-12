<?php

namespace App\Http\Livewire;

use App\Models\Coupon;
use App\Models\product;
use Livewire\Component;
use Illuminate\Support\Carbon;
use Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

use App\Mail\OrderMail;
use App\Models\Shipping;
use App\Models\OrderItem;
use App\Models\Transaction;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CartComponent extends Component
{
    public $haveCode;
    public $couponCode;
    public $discount;
    public $subtotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;
    public $delivery_price;
    public $paymentmode;

    // billing address properties
    public $firstname;
    public $lastname;
    public $email;
    public $mobile;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $country;
    public $zipcode;
    public $thankyou;
    public $subtotal;

    public function mount()
    {
        // Set the default value for delivery_price
        $this->delivery_price = 60; // or the value you want to be default
    }

    // increasing cart quantity
    public function increaseQuantity($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component','refreshComponent');
    }
      // decreasing cart quantity
    public function decreaseQuantity($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component','refreshComponent');
    }
    //deleting item form the cart
    public function destroy($rowId){
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component','refreshComponent');
        Session()->flash('success_message', 'Item has been removed');
    }
    // deleting all items form cart
    public function destroyAll(){
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-count-component','refreshComponent');
        Session()->flash('success_message', 'All Items has been removed');
    }
    // swith item to the save Later
    public function switchSaveLater($rowId){
        $item = Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($rowId);
        Cart::instance('saveForLater')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
        Session()->flash('success_message', 'item added to Save For Later');
    }
    // move item from save later to cart
    public function moveToCart($rowId){
        $item = Cart::instance('saveForLater')->get($rowId);
        Cart::instance('saveForLater')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
        Session()->flash('s_success_message', 'item added to the Cart');
    }
    // delete item from save later
    public function deleteFromSaveLater($rowId){
        Cart::instance('saveForLater')->remove($rowId);
        Session()->flash('s_success_message', 'item Deleted From Saved Later');
    }
    // Apply coupon Code
    public function applyCouponCode(){
        $coupon = Coupon::where('code',$this->couponCode)->where('expiry_date','>=',Carbon::today())->where('cart_value','<=',Cart::instance('cart')->subtotal())->first();
        if(!$coupon){
            session()->flash('coupon_message','Coupon is invalid');
            return;
        }
        session()->put('coupon',[
            'code' => $coupon->code,
            'type' => $coupon->type,
            'value' => $coupon->value,
            'cart_value' => $coupon->cart_value
        ]);

    }
    // Discount calculating after discount
    public function calculateAfterDicount(){
        if(session()->has('coupon')){
            if(session()->get('coupon')['type'] == 'fixed'){
                $this->discount = session()->get('coupon')['value'];
            }
            else{
                $this->discount = (Cart::instance('cart')->subtotal() * session()->get('coupon')['value'])/100;
            }
            $this->subtotalAfterDiscount = Cart::instance('cart')->subtotal() - $this->discount;
            $this->taxAfterDiscount = ($this->subtotalAfterDiscount * config('cart.tax'))/100;
            $this->totalAfterDiscount = $this->subtotalAfterDiscount + $this->taxAfterDiscount;
        }
    }
    //remove coupon code
    public function removeCoupon(){
        session()->forget('coupon');
    }
    //access checkout if user is logged-in
    public function checkout(){
        if(Auth::check()){
            return redirect()->route('checkout');
        }
        else{
            // return redirect()->route('register');
            return redirect()->route('checkout');
        }
    }
    // set amount for the checkout
    public function setAmountForCheckout(){
        if(!Cart::instance('cart')->count() > 0){
            session()->forget('checkout');
            return;
        }
        if(session()->has('coupon')){
            session()->put('checkout',[
                'discount' =>$this->discount,
                'subtotal' =>$this->subtotalAfterDiscount,
                'tax' =>$this->delivery_price,
                'total' =>$this->totalAfterDiscount
            ]);
        }
        else{
            session()->put('checkout',[
                'discount' => 0,
                'subtotal' =>Cart::instance('cart')->subtotal(),
                'tax' =>$this->delivery_price,
                'total' =>Cart::instance('cart')->subtotal() + $this->delivery_price
            ]);
        }
    }
    public function render()
    {
        if(session()->has('coupon')){
            if(Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value']){
                session()->forget('coupon');
            }
            else{
                $this->calculateAfterDicount();
            }
        }
        $this->setAmountForCheckout();

        if(Auth::check()){
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }
        $popular_products = product::inRandomOrder()->limit(4)->get();
        return view('livewire.cart-component',['popular_products'=>$popular_products])->layout('layouts.home');
    }

    public function updated($fields){
        // validation for billing address
        $this->validateOnly($fields,[
            'lastname' => 'required',
            'mobile' => 'required|numeric',
            'line1' => 'required',
            'city' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
        ]);
    }

    public function placeOrder(){ 
        $this->validate([
            'lastname' => 'required',
            'mobile' => 'required|numeric',
            'line1' => 'required',
            'city' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
        ]);
        
         //store order details
        $order = new Order();
        // $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->discount = session()->get('checkout')['discount'];
        $order->tax = session()->get('checkout')['tax'];
        // $order->tax = 0;
        $order->total = session()->get('checkout')['total'];
        // $order->firstname = Auth::user()->name;
        $order->lastname = $this->lastname;
        // $order->email = Auth::user()->email;
        // $order->email = $this->email;
        $order->mobile = $this->mobile;
        $order->line1 = $this->line1;
        $order->city = $this->city;
        $order->country = $this->country;
        $order->zipcode = $this->zipcode;
        $order->status = 'ordered';
        // $order->is_shipping_different = $this->ship_to_different ? 1:0;
        $order->save();

          //store orderItem details
        foreach(Cart::instance('cart')->content() as $item){
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id =$order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            if($item->options){
                $orderItem->options = serialize($item->options);
            }
            $orderItem->save();
        }
            //store transaction details
        if($this->paymentmode == 'cod'){
            $this->makeTransaction($order->id, 'pending');
            $this->resetCart();
            return redirect()->to('/thank-you');
        }
        else if($this->paymentmode == 'card'){
          $stripe = Stripe::make(env('STRIPE_KEY'));
          try{
              $token = $stripe->tokens()->create([
                  'card'=>[
                      'number' => $this->card_no,
                      'exp_month' => $this->exp_month,
                      'exp_year' => $this->exp_year,
                      'cvc' => $this->cvc
                  ]
                ]);

                if(!isset($token['id'])){
                    session()->flash('stripe_error','The Stripe token was generated correctlly!');
                    $this->thankyou = 0;
                }

                $customer = $stripe->customers()->create([
                    'name' => $this->firstname . '.' . $this->lastname,
                    'email' => $this->email,
                    'phone' => $this->mobile,
                    'address' => [
                        'line1' => $this->line1,
                        'postal_code' => $this->zipcode,
                        'city' => $this->city,
                        'state' => $this->province,
                        'country' => $this->country
                    ],
                    'shipping' => [
                        'name' => $this->firstname . '.' . $this->lastname,
                        'address' => [
                            'line1' => $this->line1,
                            'postal_code' => $this->zipcode,
                            'city' => $this->city,
                            'state' => $this->province,
                            'country' => $this->country
                        ],
                    ],
                    'source' => $token['id']
                ]);
                $charge = $stripe->charges()->create([
                    'customer' => $customer['id'],
                    'currency' => 'USD',
                    'amount' => session()->get('checkout')['total'],
                    'description' => 'payment for order no' . $order->id
                ]);

                if($charge['status'] == 'succeeded'){
                    $this->makeTransaction($order->id, 'approved');
                    $this->resetCart();
                }
                else{
                    session()->flash('stripe_error', 'Error in Transaction');
                    $this->thankyou = 0;
                }
          }
          catch(Exception $e){
            session()->flash('stripe_error',$e->getMessage());
            $this->thankyou =0;
          }

        }
        // $this->sendOrderConfirmationMail($order);
        if($this->thankyou){
            return redirect()->route('thankyou');
        }
        $this->resetCart();
        return redirect()->route('thankyou');


}


public function resetCart(){
    $this->thankyou = 1;
    Cart::instance('cart')->destroy();
    session()->forget('checkout');
}

public function makeTransaction($order_id, $status){
    $transaction = new Transaction();
    $transaction->user_id = Auth::user()->id;
    $transaction->order_id = $order_id;
    $transaction->mode = $this->paymentmode;
    $transaction->status = $status;
    $transaction->save();
}

// send mail after order placed
public function sendOrderConfirmationMail($order){
    Mail::to($order->email)->send(new OrderMail($order));
}
//verify for checkout if user-loggedin or user-cart is empty
public function verifyForCheckout(){
    if(!Auth::check()){
         return redirect()->route('checkout');
    }
    else if($this->thankyou){
        return redirect()->route('thankyou');
    }
    else if(!session()->get('checkout')){
        return redirect()->route('product.cart');
    }
}

}
