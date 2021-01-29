<?php

namespace App\Http\Controllers;
use App\failure_history;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Order;
use App\OrderDetails;
use App\Payment;
use App\Shipping;
use App\success_history;
use Cart;
use Mail;
use App\Customer;
use Illuminate\Http\Request;
use Session;
use Stripe;

class CheckoutController extends Controller
{
    public function index(){
        return view('front-end.checkout.checkout-register');
    }

    public function signUp(Request $request){
       $customer =new Customer();

       $customer->first_name     = $request->first_name;
        $customer->last_name     = $request->last_name;
        $customer->email_address = $request->email_address;
        $customer->password      = bcrypt($request->password);
        $customer->phone_no      = $request->phone_no;
        $customer->address       = $request->address;
        $customer->save();

        $customerId = $customer->id;
        Session::put('customerId',$customerId);
        Session::put('customerName',$customer->first_name.' '.$customer->last_name);

        $data = $customer->toArray();
        Mail::send('front-end.mails.welcome-mail',$data, function ($message) use ($data){
            $message->to($data['email_address']);
            $message->subject('Welcome to GariSarao.com!');
        });

        return redirect('/checkout/shipping');
    }

    public function customerLoginCheck(Request $request){
        $customer = Customer::where('email_address' ,$request->email_address)->first();

        if(password_verify($request->password , $customer->password)){
            Session::put('customerId',$customer->id);
            Session::put('customerName',$customer->first_name.' '.$customer->last_name);

            return redirect('/checkout/shipping');
        }
        else{
            return redirect('/checkout')->with('message', 'invalid password');
        }
    }
    public function customerLogout(){

        Session::forget('customerId');
        Session::forget('customerName');
        return redirect('/');
    }

    public function newCustomerLogin(){
        return view('front-end.customer.customer-login');
    }
    public  function shipping(){
        $customer = Customer::find(Session::get('customerId'));
        return view('front-end.checkout.checkout-shipping',[
            'customer' => $customer,
        ]);
    }

    public function saveShippingInfo(Request $request)
    {
        $shipping = new Shipping();
        $shipping->full_name     = $request->full_name;
        $shipping->email_address = $request->email_address;
        $shipping->phone_no      = $request->phone_no;
        $shipping->address       = $request->address;
        $shipping->save();

        Session::put('shippingId', $shipping->id);
        return redirect('/checkout/payment');
    }

    public function paymentForm(){

        return view('front-end.checkout.payment');
    }
    public function newOrder(Request $request){
      $paymentType = $request->payment_type;

      if($paymentType == 'Cash'){

          $order  = new Order();

          $order->customer_id  = Session::get('customerId');
          $order->shipping_id  = Session::get('shippingId');
          $order->order_total  = Session::get('orderTotal');
          $order->save();


          $payment = new Payment();
          $payment->order_id     = $order->id;
          $payment->payment_type = $paymentType;
          $payment->save();

          $cartProducts = Cart::content();

          foreach ($cartProducts as $cartProduct){

              $orderDetail = new OrderDetails();
              $orderDetail->order_id      = $order->id;
              $orderDetail->product_id    = $cartProduct->id;
              $orderDetail->product_name  = $cartProduct->name;
              $orderDetail->product_price = $cartProduct->price;
              $orderDetail->product_qty   = $cartProduct->qty;
              $orderDetail->save();
          }

          Cart::destroy();

          return redirect('/checkout/payment/confirm');

      }
       else{
           $order  = new Order();
           $order->customer_id  = Session::get('customerId');
           $order->shipping_id  = Session::get('shippingId');
           $order->order_total  = Session::get('orderTotal');
           $order->save();
           $payment = new Payment();
           $payment->order_id     = $order->id;
           $payment->payment_type = $paymentType;
           $payment->save();
           $cartProducts = Cart::content();
           foreach ($cartProducts as $cartProduct){
               $orderDetail = new OrderDetails();
               $orderDetail->order_id      = $order->id;
               $orderDetail->product_id    = $cartProduct->id;
               $orderDetail->product_name  = $cartProduct->name;
               $orderDetail->product_price = $cartProduct->price;
               $orderDetail->product_qty   = $cartProduct->qty;
               $orderDetail->save();
           }
           Cart::destroy();
           $cus = Customer::findOrFail($order->customer_id);
           $ship = Shipping::findOrFail( $order->shipping_id );
           $post_data = array();
           $post_data['total_amount'] = $order->order_total; # You cant not pay less than 10
           $post_data['currency'] = "BDT";
           $post_data['tran_id'] = uniqid(); // tran_id must be unique
           # CUSTOMER INFORMATION
           $post_data['cus_name'] = $cus->first_name;
           $post_data['cus_email'] = $cus->email_address;
           $post_data['cus_add1'] = $cus->address;
           $post_data['cus_add2'] = "";
           $post_data['cus_city'] = "";
           $post_data['cus_state'] = "";
           $post_data['cus_postcode'] = "";
           $post_data['cus_country'] = "Bangladesh";
           $post_data['cus_phone'] = '8801XXXXXXXXX';
           $post_data['cus_fax'] = "";

           # SHIPMENT INFORMATION
           $post_data['ship_name'] = $ship->full_name;
           $post_data['ship_add1'] = $ship->address;
           $post_data['ship_add2'] = "Dhaka";
           $post_data['ship_city'] = "Dhaka";
           $post_data['ship_state'] = "Dhaka";
           $post_data['ship_postcode'] = "1000";
           $post_data['ship_phone'] = $ship->phone_no;
           $post_data['ship_country'] = "Bangladesh";

           $post_data['shipping_method'] = "NO";
           $post_data['product_name'] = "Computer";
           $post_data['product_category'] = "Goods";
           $post_data['product_profile'] = "physical-goods";

           $post_data['value_a'] = $order->id;//application_class
           $post_data['value_b'] = $ship->id;//application_class
           $post_data['value_c'] = $cus->id;//user_id
           $post_data['value_d'] = $payment->id;//application_type
//           return redirect('/checkout/payment/stripe');
           $sslc = new SslCommerzNotification();
           $payment_options = $sslc->makePayment($post_data, 'hosted');
           if (!is_array($payment_options)) {
               print_r($payment_options);
               $payment_options = array();
           }
      }
    }

    public function success(Request $request)
    {
        $order = Order::findOrFail($request->value_a);
        $order->order_status ='Processing';
        $order->save();
        $payment = Payment::findOrFail($request->value_d);
        $payment->payment_status='paid';
        $payment->save();

        $data = success_history::insert([
            'tran_id'=>$request->tran_id,
            'val_id'=>$request->val_id,
            'amount'=>$request->amount,
            'card_type'=>$request->card_type,
            'store_amount'=>$request->store_amount,
            'card_no'=>$request->card_no,
            'bank_tran_id'=>$request->bank_tran_id,
            'status'=>$request->status,
            'tran_date'=>$request->tran_date,
            'error'=>$request->error,
            'currency'=>$request->currency,
            'card_issuer'=>$request->card_issuer,
            'card_brand'=>$request->card_brand,
            'card_sub_brand'=>$request->card_sub_brand,
            'card_issuer_country'=>$request->card_issuer_country,
            'card_issuer_country_code'=>$request->card_issuer_country_code,
            'store_id'=>$request->store_id,
            'verify_sign'=>$request->verify_sign,
            'verify_key'=>$request->verify_key,
            'verify_sign_sha2'=>$request->verify_sign_sha2,
            'currency_type'=>$request->currency_type,
            'currency_amount'=>$request->currency_amount,
            'currency_rate'=>$request->currency_rate,
            'base_fair'=>$request->base_fair,
            'order_id'=>$request->value_a,
            'shipping_id'=>$request->value_b,
            'customer_id'=>$request->value_c,
            'payment_id'=>$request->value_d,
            'risk_level'=>$request->risk_level,
            'risk_title'=>$request->risk_title,
        ]);
        echo "successfull";
        Session::flash('success', 'Congratulations! Payment is successful!!');

        return redirect('/checkout/payment/confirm');
    }
    public function fail(Request $request)
    {
        $order = Order::findOrFail($request->value_a);
        $order->order_status ='pending';
        $order->save();
        $payment = Payment::findOrFail($request->value_d);
        $payment->payment_status='failed';
        $payment->save();
        echo 'failed';
        $data =  failure_history::insert([
            'tran_id'=>$request->tran_id,
            'error'=>$request->error,
            'status'=>$request->status,
            'bank_tran_id'=>$request->bank_tran_id,
            'currency'=>$request->currency,
            'tran_date'=>$request->tran_date,
            'amount'=>$request->amount,
            'store_id'=>$request->store_id,
            'card_type'=>$request->card_type,
            'card_no'=>$request->card_no,
            'card_issuer'=>$request->card_issuer,
            'card_brand'=>$request->card_brand,
            'card_sub_brand'=>$request->card_sub_brand,
            'card_issuer_country'=>$request->card_issuer_country,
            'card_issuer_country_code'=>$request->card_issuer_country_code,
            'currency_type'=>$request->currency_type,
            'currency_amount'=>$request->currency_amount,
            'currency_rate'=>$request->currency_rate,
            'base_fair'=>$request->base_fair,
            'order_id'=>$request->value_a,
            'shipping_id'=>$request->value_b,
            'customer_id'=>$request->value_c,
            'payment_id'=>$request->value_d,
            'verify_sign'=>$request->verify_sign,
            'verify_key'=>$request->verify_key,
            'verify_sign_sha2'=>$request->verify_sign_sha2,
        ]);
        Session::flash('success', 'Payment is failed!');

        return redirect('/checkout/payment/confirm');
    }
    public function cancel(Request $request)
    {
        $order = Order::findOrFail($request->value_a);
        $order->order_status ='pending';
        $order->save();
        $payment = Payment::findOrFail($request->value_d);
        $payment->payment_status='cancelled';
        $payment->save();
        echo 'cancelled';
        Session::flash('success', 'Payment is cancelled!');

        return redirect('/checkout/payment/confirm');
    }
    public function confirmPayment(){

        return view('front-end.checkout.confirm-payment');
    }
    public function stripe()
    {
        return view('front-end.checkout.stripe');
    }
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
            "amount"      => 100 * 100,
            "currency"    => "usd",
            "source"      => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com."
        ]);

        Session::flash('success', 'Payment successful!');

        return redirect('/checkout/payment/confirm');
    }

}
