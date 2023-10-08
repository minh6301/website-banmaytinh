<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    //
    public function show(){
        $cart = Cart::with('product')->get();

        return view('view.view-payment', compact('cart'));
    }

    public function dathang(Request $request){
        $fullname = $request -> input('fullname');
        $phone = $request -> input('phone');
        $email = $request -> input('email');
        $city = $request -> input('city');
        $district = $request -> input('district');
        $ward = $request -> input('ward');
        $home = $request -> input('home');
        $yeucau = $request -> input('yeucau');
        $totalprice = $request -> input('totalprice');
        $product = $request -> input('product');
        $user_id = Auth::user()->id;

        $data_order = array(
            "fullname" => $fullname,
             "phone" => $phone, 
             "email" => $email,
             "city" => $city,
             "district" => $district,
             "ward" => $ward,
             "home" => $home,
             "yeucau" => $yeucau,
             "totalprice" => $totalprice,
             "product" => $product,
             "user_id" => $user_id
            );

        $order = DB::table('orders')->insert($data_order);


        if($order == true){
            return redirect() -> route('layouts.computech');
        }
        else{
            return back();
        }
    }

    function vnpay_payment(Request $request){

        $fullname = $request -> input('fullname');
        $phone = $request -> input('phone');
        $email = $request -> input('email');
        $city = $request -> input('city');
        $district = $request -> input('district');
        $ward = $request -> input('ward');
        $home = $request -> input('home');
        $yeucau = $request -> input('yeucau');
        $totalprice = $request -> input('totalprice');
        $product = $request -> input('product');
        $madonhang = $request -> input('madonhang');
        $payment_type = $request ->input('payment_type');
        $user_id = Auth::user()->id;

        $data_order = array(
            "fullname" => $fullname,
             "phone" => $phone, 
             "email" => $email,
             "city" => $city,
             "district" => $district,
             "ward" => $ward,
             "home" => $home,
             "yeucau" => $yeucau,
             "totalprice" => $totalprice,
             "product" => $product,
             "madonhang" => $madonhang,
             "payment_type" => $payment_type,
             "user_id" => $user_id
            );

        $order = DB::table('orders')->insert($data_order);

        if($payment_type == "1")
        {
            Cart::where('user_id', '=', $user_id)->delete();
            return redirect() -> route('layouts.computech');
        }

        $data = $request -> all();

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('vnpay.return');
        $vnp_TmnCode = "FGXWET1S";//Mã website tại VNPAY 
        $vnp_HashSecret = "OVRJQXEYHVGQESJBPMFEVGEDWKRHWHZL"; //Chuỗi bí mật

        $vnp_TxnRef = $data['madonhang']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán hoá đơn";
        $vnp_OrderType = "Computech";
        $vnp_Amount = $data['totalprice'] * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
            // vui lòng tham khảo thêm tại code demo
    }

    public function vnpayReturn(Request $request){
        $vnpay_data = $request -> all();

        

        
        return view('view.view-vnpay-return', compact('vnpay_data'));

    }

    public function updateOrder(Request $request ){

        $vnpay_data = $request -> all();

        dd($vnpay_data);


        // DB::table('orders')->where('madonhang', $madonhang)->update(["status" => 'Đã thanh toán']);
    }
}
