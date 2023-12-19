@extends('layouts.front')

@section('title')
   My Cart

@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
           <b> TRANG GIỎ HÀNG </b>
        </h6>
    </div>
</div>

<div class="container my-5">
    <div class="card shadow cartitems">
        @if($cartitems->count()>0)
        <div class="card-body">
            @php $total=0; @endphp
            @foreach($cartitems as $item)
            <div class="row product_data">
                <div class="col-md-2 my-auto">
                    <img src="{{asset('assets/uploads/product/'.$item->products->image)}}" height="50px" width="70px" alt="Image here">
                </div>
                <div class="col-md-3 my-auto">
                    <h6>{{$item->products->brand_name}} {{$item->products->model_name}}</h6>
                </div>
                <div class="col-md-2 my-auto">
                    <h6>{{$item->products->selling_price}}.VNĐ</h6>
                </div>
                <div class="col-md-3 my-auto">
                    <input type="hidden" class="prod_id" value="{{$item->product_id}}">
                    
                      <label for="Quantity">Số lượng</label>
                      <div class="input-group text-center mb-3" style="width:130px;">
                         <button class="input-group-text changequantity decrement-btn">-</button>
                         <input type="text" name="quantity" class="form-control qty-input text-center" value="{{$item->product_quantity}}">
                         <button class="input-group-text changequantity increment-btn">+</button>
                
                       </div>
                   
                </div>
                <div class="col-md-2 my-auto">
                    <button class="btn btn-danger deletecartitem">Xóa sản phẩm <i class="bi bi-trash"></i></button>
                </div>
            </div>
            @php $total+=$item->products->selling_price*$item->product_quantity; @endphp
            @endforeach
        </div>
        <div class="card-footer">
            <h6>Tổng giá = {{$total}}.VNĐ
            <a href="{{url('/checkout')}}" class="btn btn-outline-success float-end" style="text-decoration: none;">Tiến hành kiểm tra</a>
            </h6>
        </div>
        @else
            <div class="card-body text-center">
                <h2> <i class="bi bi-cart-x-fill">của bạn </i><i class="bi bi-emoji-frown-fill">trống rỗng</i></h2><br/><br/><hr/>
                <a href="{{url('allcategories')}}" class="btn btn-outline-success float-end" style="text-decoration: none;">Đi mua sắm</a>
            </div>
        @endif
    </div>
</div>


@endsection