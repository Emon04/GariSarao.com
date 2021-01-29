<?php

namespace App\Http\Controllers;

use App\failure_history;
use App\Models\Users\Electrician\ElectricianApplication;
use App\Models\Users\Electrician\ElectricianCenterFee;
use App\Models\Users\SupervisorApplication;
use App\Models\Users\SupervisorCenterFee;
use App\success_history;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Library\SslCommerz\SslCommerzNotification;


class SslCommerzPaymentController extends Controller
{

//    public function exampleEasyCheckout()
//    {
//        return view('exampleEasycheckout');
//    }
//
//    public function exampleHostedCheckout()
//    {
//        return view('exampleHosted');
//    }

    public function index(Request $request)
    {
//        dd($request->all());
        $id = $request->application_id;
        $application_id ='';
        if ($request->application_type == 'supervisor'){
            $application_id = SupervisorApplication::with('user')->where('supervisor_application_id','=',$id)->first();
        }elseif ($request->application_type == 'electrician'){
            $application_id = ElectricianApplication::with('user')->where('electrician_application_id','=',$id)->first();
        }
        $post_data = array();
        $post_data['total_amount'] = $request->amount; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $application_id->user->full_name;
        $post_data['cus_email'] = 'customer@mail.com';
        $post_data['cus_add1'] = 'Customer Address';
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = '8801XXXXXXXXX';
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        if ($request->application_type == 'supervisor'){
            $post_data['value_a'] = $application_id->supervisor_application_id;
        }elseif  ($request->application_type == 'electrician'){
            $post_data['value_a'] = $application_id->electrician_application_id;
        }
        //application_id
        $post_data['value_b'] = $application_id->application_class;//application_class
        $post_data['value_c'] = auth()->user()->id;//user_id
        $post_data['value_d'] = $request->application_type;//application_type

        #Before  going to initiate the payment order status need to insert or update as Pending.
        $center_fee = '';
        if ($request->application_type == 'supervisor'){
            $center_fee = SupervisorCenterFee::where('supervisor_application_id',$application_id->supervisor_application_id)->first();
            if ($center_fee ==null){
                $center_fee = new SupervisorCenterFee();
            }
            $center_fee->supervisor_application_id= $post_data['value_a'];
        }
        if ($request->application_type == 'electrician'){
            $center_fee = ElectricianCenterFee::where('electrician_application_id',$application_id->electrician_application_id)->first();
            if ($center_fee ==null){
                $center_fee = new ElectricianCenterFee();
            }
            $center_fee->electrician_application_id= $post_data['value_a'];
        }
       $center_fee->bank_name= '';
       $center_fee->amount= $post_data['total_amount'];
       $center_fee->status= 1;
       $center_fee->transaction_id= $post_data['tran_id'];
       $center_fee->save();
//        $update_product = DB::table('supervisor_center_fees')
//            ->insert([
//                'supervisor_application_id'=> $post_data['value_a'],
////                'user_id'=> auth()->user()->id,
//                'bank_name'=> '',
//                'amount' => $post_data['total_amount'],
//                'status' => "Pending",
//                'transaction_id'=>$post_data['tran_id'],
//            ]);
//
        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }

    }

//    public function payViaAjax()
//    {
//        $id = $request->Supervisor_application_id;
//        $application_id = SupervisorApplication::with('user')->where('supervisor_application_id','=',$id);
////        dd($application_id);
//        # Here you have to receive all the order data to initate the payment.
//        # Lets your oder trnsaction informations are saving in a table called "orders"
//        # In orders table order uniq identity is "transaction_id","status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.
//
//        $post_data = array();
//        $post_data['total_amount'] ='10'; # You cant not pay less than 10
//        $post_data['currency'] = "BDT";
//        $post_data['tran_id'] = uniqid(); // tran_id must be unique
//
//        # CUSTOMER INFORMATION
//        $post_data['cus_name'] = $application_id->full_name;
//        $post_data['cus_email'] = 'customer@mail.com';
//        $post_data['cus_add1'] = 'Customer Address';
//        $post_data['cus_add2'] = "";
//        $post_data['cus_city'] = "";
//        $post_data['cus_state'] = "";
//        $post_data['cus_postcode'] = "";
//        $post_data['cus_country'] = "Bangladesh";
//        $post_data['cus_phone'] = '8801XXXXXXXXX';
//        $post_data['cus_fax'] = "";
//
//        # SHIPMENT INFORMATION
//        $post_data['ship_name'] = "Store Test";
//        $post_data['ship_add1'] = "Dhaka";
//        $post_data['ship_add2'] = "Dhaka";
//        $post_data['ship_city'] = "Dhaka";
//        $post_data['ship_state'] = "Dhaka";
//        $post_data['ship_postcode'] = "1000";
//        $post_data['ship_phone'] = "";
//        $post_data['ship_country'] = "Bangladesh";
//
//        $post_data['shipping_method'] = "NO";
//        $post_data['product_name'] = "Computer";
//        $post_data['product_category'] = "Goods";
//        $post_data['product_profile'] = "physical-goods";
//
//        # OPTIONAL PARAMETERS
//        $post_data['value_a'] = $application_id->application_no;
//        $post_data['value_b'] = $application_id->application_class;
//        $post_data['value_c'] = auth()->user()->id;
//        $post_data['value_d'] = 'supervisor';
//
//
//        #Before  going to initiate the payment order status need to update as Pending.
//        $update_product = DB::table('orders')
//            ->where('transaction_id', $post_data['tran_id'])
//            ->updateOrInsert([
//                'name' => $post_data['cus_name'],
//                'email' => $post_data['cus_email'],
//                'phone' => $post_data['cus_phone'],
//                'amount' => $post_data['total_amount'],
//                'status' => 'Pending',
//                'address' => $post_data['cus_add1'],
//                'transaction_id' => $post_data['tran_id'],
//                'currency' => $post_data['currency']
//            ]);
//
//        $sslc = new SslCommerzNotification();
//        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
//        $payment_options = $sslc->makePayment($post_data, 'checkout', 'json');
//
//        if (!is_array($payment_options)) {
//            print_r($payment_options);
//            $payment_options = array();
//        }
//
//    }



private static function failure(Request $request){
    return failure_history::insert([
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
        'application_id'=>$request->value_a,
        'application_class'=>$request->value_b,
        'user_id'=>$request->value_c,
        'application_type'=>$request->value_d,
        'verify_sign'=>$request->verify_sign,
        'verify_key'=>$request->verify_key,
        'verify_sign_sha2'=>$request->verify_sign_sha2,
]);
}

    public function success(Request $request)
    {
//        dd($request->value_d);
        echo "Transaction is Successful";

        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');

        $sslc = new SslCommerzNotification();

        #Check order status in order table against the transaction id or order id.if
        $order_detials = '';
        if ($request->value_d=='supervisor'){
            $order_detials = DB::table('supervisor_center_fees')
                ->where('transaction_id', $tran_id)
                ->select('transaction_id', 'status','amount')->first();
        } elseif ($request->value_d=='electrician'){
            $order_detials = DB::table('electrician_center_fees')
                ->where('transaction_id', $tran_id)
                ->select('transaction_id', 'status','amount')->first();
        }


        if ($order_detials->status == 1) {
            $validation = $sslc->orderValidate($tran_id, $amount,$currency, $request->all());

            if ($validation == TRUE) {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
                in order table as Processing or Complete.
                Here you can also sent sms or email for successfull transaction to customer
                */
                if ($request->value_d=='supervisor'){
                    $update_product = DB::table('supervisor_center_fees')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 2]);
                    $supapp = SupervisorApplication::where('supervisor_application_id','=',$request->value_a)->first();
                    $supapp->center_fee_status='verified';
                    $supapp->save();
                } elseif ($request->value_d=='electrician'){
                    $update_product = DB::table('electrician_center_fees')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 2]);
                    $supapp = ElectricianApplication::where('electrician_application_id','=',$request->value_a)->first();
                    $supapp->center_fee_status='verified';
                    $supapp->save();
                }


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
                    'application_id'=>$request->value_a,
                    'application_class'=>$request->value_b,
                    'user_id'=>$request->value_c,
                    'application_type'=>$request->value_d,
                    'risk_level'=>$request->risk_level,
                    'risk_title'=>$request->risk_title,
                ]);
//        dd($data);
                echo "<br >Transaction is successfully Completed";
                session()->flash('successMessage','Your payment is successfully completed');
                return redirect()->route('user.dashboard');

            } else {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel and Transation validation failed.
                Here you need to update order status as Failed in order table.
                */
            if ($request->value_d=='supervisor'){
                $update_product = DB::table('supervisor_center_fees')
                    ->where('transaction_id', $tran_id)
                    ->update(['status' => 3]);
                self::failure($request);
            }  elseif ($request->value_d=='electrician'){
                $update_product = DB::table('electrician_center_fees')
                    ->where('transaction_id', $tran_id)
                    ->update(['status' => 3]);
                self::failure($request);
            }
                session()->flash('warning','Invalid Transaction');
                return redirect()->route('user.dashboard');
            }
        } else if ($order_detials->status == 'Paid' || $order_detials->status == 'Complete') {
            /*
             That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
             */
            echo "Transaction is successfully Completed";
            session()->flash('successMessage','Already Paid');
            return redirect()->route('user.dashboard');
        } else {
            #That means something wrong happened. You can redirect customer to your product page.
            echo "Invalid Transaction";
            session()->flash('warning','Invalid Transaction');
            return redirect()->route('user.dashboard');
        }


    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');
        $order_detials='';
        if ($request->value_d=='supervisor'){
            $order_detials = DB::table('supervisor_center_fees')
                ->where('transaction_id', $tran_id)
                ->select('transaction_id', 'status', 'amount')->first();
            $supapp = SupervisorApplication::where('supervisor_application_id','=',$request->value_a)->first();
            $supapp->center_fee_status='not paid';
            $supapp->save();
        }elseif ($request->value_d=='electrician'){
            $order_detials = DB::table('electrician_center_fees')
                ->where('transaction_id', $tran_id)
                ->select('transaction_id', 'status', 'amount')->first();
            $supapp = ElectricianApplication::where('electrician_application_id','=',$request->value_a)->first();
            $supapp->center_fee_status='not paid';
            $supapp->save();
        }

//        dd($supapp);
        if ($order_detials->status == 1) {
            if ($request->value_d=='supervisor'){
                $update_product = DB::table('supervisor_center_fees')
                    ->where('transaction_id', $tran_id)
                    ->update(['status' => 3]);
                self::failure($request);
            } elseif ($request->value_d=='electrician'){
                $update_product = DB::table('electrician_center_fees')
                    ->where('transaction_id', $tran_id)
                    ->update(['status' => 3]);
                self::failure($request);
            }
            echo "Transaction is Falied";
            session()->flash('warning','Payment not completed! Transaction is failed. please try again');
            return redirect()->route('user.dashboard');
        } else if ($order_detials->status == 'Verified' || $order_detials->status == 2) {
            echo "Transaction is already Successful";
            session()->flash('successMessage','Already Paid');
            return redirect()->route('user.dashboard');
        } else {
            echo "Transaction is Invalid";
        }

    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');
        $order_detials='';
        if ($request->value_d=='supervisor'){
            $order_detials = DB::table('supervisor_center_fees')
                ->where('transaction_id', $tran_id)
                ->select('transaction_id', 'status', 'amount')->first();
            $supapp = SupervisorApplication::where('supervisor_application_id','=',$request->value_a)->first();
            $supapp->center_fee_status='not paid';
            $supapp->save();
        }elseif ($request->value_d=='electrician'){
            $order_detials = DB::table('electrician_center_fees')
                ->where('transaction_id', $tran_id)
                ->select('transaction_id', 'status', 'amount')->first();
            $supapp = ElectricianApplication::where('supervisor_application_id','=',$request->value_a)->first();
            $supapp->center_fee_status='not paid';
            $supapp->save();
        }

        if ($order_detials->status == 1 || $order_detials->status == 3 ||$order_detials->status == 4) {
            if ($request->value_d=='supervisor'){
                $update_product = DB::table('supervisor_center_fees')
                    ->where('transaction_id', $tran_id)
                    ->update(['status' => 4]);
            }  elseif ($request->value_d=='electrician'){
                $update_product = DB::table('electrician_center_fees')
                    ->where('transaction_id', $tran_id)
                    ->update(['status' => 4]);
            }

            echo "Transaction is Cancel";
            session()->flash('warning','Payment not completed! Transaction is cancelled. please try again');
            return redirect()->route('user.dashboard');
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 2) {
            echo "Transaction is already Successful";
            session()->flash('warning','Already Paid');
            return redirect()->route('user.dashboard');
        } else {
            echo "Transaction is Invalid";
            session()->flash('warning','Payment not completed! Invalid Transaction. please try again');
            return redirect()->route('user.dashboard');
        }


    }

    public function ipn(Request $request)
    {
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {

            $tran_id = $request->input('tran_id');

            #Check order status in order tabel against the transaction id or order id.
            $order_details = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->select('transaction_id', 'status', 'currency', 'amount')->first();

            if ($order_details->status == 'Pending') {
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($tran_id, $order_details->amount, $order_details->currency, $request->all());
                if ($validation == TRUE) {
                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                    */
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Processing']);

                    echo "Transaction is successfully Completed";
                } else {
                    /*
                    That means IPN worked, but Transation validation failed.
                    Here you need to update order status as Failed in order table.
                    */
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Failed']);

                    echo "validation Fail";
                }

            } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {

                #That means Order status already updated. No need to udate database.

                echo "Transaction is already successfully Completed";
            } else {
                #That means something wrong happened. You can redirect customer to your product page.

                echo "Invalid Transaction";
            }
        } else {
            echo "Invalid Data";
        }
    }

}
