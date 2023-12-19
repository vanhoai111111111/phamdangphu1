<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;
use App\Models\Rating;

class RatingController extends Controller
{
    public function add(Request $request){
        $stars_rated=$request->input('product_rating');
        $product_id=$request->input('product_id');

        $product_check=Product::where('id',$product_id)->first();
        if($product_check){

            $verified_purchase=Order::where('orders.user_id',Auth::id())->join('order_items','orders.id','order_items.order_id')->where('order_items.product_id',$product_id)->get();
            
            if($verified_purchase->count()>0){

                $existing_rating=Rating::where('user_id',Auth::id())->where('product_id',$product_id)->first();

                if($existing_rating){

                    $existing_rating->stars_rated=$stars_rated;
                    $existing_rating->update();
               
                }else{
                    Rating::create([
                        'user_id'=>Auth::id(),
                        'product_id'=>$product_id,
                        'stars_rated'=>$stars_rated
                    ]);
                }
                return redirect()->back()->with('status',"Cảm ơn bạn đã xếp hạng");
            }else{
                return redirect()->back()->with('warn',"Bạn không thể đánh giá một sản phẩm mà không mua hàng");
            }
        }else{
            return redirect()->back()->with('warn',"Link was broken");
                
        }

    }
}
