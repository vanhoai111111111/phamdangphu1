<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Product;
use App\Mail\OrderMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    
public function vnp(){
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "http://127.0.0.1:8000/payment/return";
$vnp_TmnCode = "10KEBV87";//Mã website tại VNPAY 
$vnp_HashSecret = "GOJEHAJROFZDQVXDTXDGHKPFVDJWDRTL"; //Chuỗi bí mật

$vnp_TxnRef =Str::random(10); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
$vnp_OrderInfo = 'order_desc';
$vnp_OrderType = 'order_type';
$vnp_Amount = $_POST['money'] * 100;
$vnp_Locale = 'VN';
$vnp_BankCode = 'NCB';
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
    public function index(){
        $cartitems=Cart::where('user_id',Auth::id())->get();
        
        return view('frontend.checkout',compact('cartitems'));
        
        
    }
    public function paymentReturn(Request $request){
        $cartitems=Cart::where('user_id',Auth::id())->get();
       
        $order->user_id=Auth::id();
        $order->fname=$request->input('fname');
        $order->lname=$request->input('lname');
        $order->email=$request->input('email');
        $order->phone=$request->input('phone');
        $order->address=$request->input('address');
        $order->city=$request->input('city');
        $order->color=$request->input('color');
        $order->payment_mode=$request->input('payment_mode');
        $order->payment_id=$request->input('payment_id');
        $total=0;
        $cartitems_total=Cart::where('user_id',Auth::id())->get();
        foreach($cartitems_total as $product){
            $tot=$product->products->selling_price*$product->product_quantity;
            $total=$total+$tot;
            
        }

        $order->total_price=$total;
        
        
        $order->save();
        if(Auth::user()->address==Null){
            $user=User::where('id',Auth::id())->first();
            $user->name=$request->input('fname');
            $user->lname=$request->input('lname');
            $user->phone=$request->input('phone');
            $user->address=$request->input('address');
            $user->city=$request->input('city');
           
            $user->update();
        }

        $cartitems=Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cartitems);
        return redirect('/checkout')->with('status','Đặt hàng thành công và thanh toán thành công');
    
    }  
    
    public function placeorder(Request $request){
        $order=new Order();
        $order->user_id=Auth::id();
        $order->fname=$request->input('fname');
        $order->lname=$request->input('lname');
        $order->email=$request->input('email');
        $order->phone=$request->input('phone');
        $order->address=$request->input('address');
        $order->city=$request->input('city');
        $order->color=$request->input('color');
        $order->payment_mode=$request->input('payment_mode');
        $order->payment_id=$request->input('payment_id');
       
        
        $total=0;
        $cartitems_total=Cart::where('user_id',Auth::id())->get();
        foreach($cartitems_total as $product){
            $tot=$product->products->selling_price*$product->product_quantity;
            $total=$total+$tot;
            
        }

        $order->total_price=$total;
        
        
        $order->save();

        

        $cartitems=Cart::where('user_id',Auth::id())->get();
        foreach($cartitems as $items){
            OrderItem::create([
                'order_id'=>$order->id,
                'product_id'=>$items->product_id,
                'quantity'=>$items->product_quantity,
                'price'=>$items->products->selling_price,
                
            ]);

            $product=Product::where('id',$items->product_id)->first();
            $product->quantity=$product->quantity-$items->product_quantity;
            $product->update();
        }

        if(Auth::user()->address==Null){
            $user=User::where('id',Auth::id())->first();
            $user->name=$request->input('fname');
            $user->lname=$request->input('lname');
            $user->phone=$request->input('phone');
            $user->address=$request->input('address');
            $user->city=$request->input('city');
           
            $user->update();
        }

        $cartitems=Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cartitems);
        if($request->input('payment_mode')=="Online Payment"){
            request()->validate(['email'=>'required|email']);
            Mail::to(request('email'))->send(new OrderMail($order));
            return response()->json(['status'=>'Đặt hàng thành công và gửi thư xác nhận.']);
            
        }
        
        
        request()->validate(['email'=>'required|email']);
        Mail::to(request('email'))->send(new OrderMail($order));
        return redirect('/checkout')->with('status','Đặt hàng thành công và gửi thư xác nhận.');
    
        
        

        
    }
    
    

    public function pay(Request $request){
        
        $cartitem = Cart::where('user_id',Auth::id())->get();
        $total_price = 0;
        foreach($cartitem as $item){
            $total_price += $item->products->selling_price*$item->product_quantity;
           
        }

        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $city = $request->input('city');

        return response()->json([
            'firstname'=>$firstname,
            'lastname'=>$lastname,
            'email'=>$email,
            'phone'=>$phone,
            'address'=>$address,
            'city'=>$city,
            'total_price'=>$total_price
        ]);
        

        
    }

    

    
}