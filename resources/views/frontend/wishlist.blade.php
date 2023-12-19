@extends('layouts.front')

@section('title')
   Wishlist

@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <b>TRANG DANH SÁCH YÊU THÍCH</b>
        </h6>
    </div>
</div>

<div class="container my-5">
    <div class="card shadow wishlistitems">
        <div class="card-body">
            @if($wishlist->count() >0)
                @foreach($wishlist as $item)
                    <div class="row product_data">
                        <div class="col-md-2 my-auto">
                            <img src="{{asset('assets/uploads/product/'.$item->products->image)}}" height="50px" width="70px" alt="Image here">
                        </div>
                        <div class="col-md-2 my-auto">
                            <h6>{{$item->products->brand_name}} {{$item->products->model_name}}</h6>
                        </div>
                        <div class="col-md-2 my-auto">
                            <h6>{{$item->products->selling_price}}.VNĐ</h6>
                        </div>
                        <div class="col-md-2 my-auto">
                            <input type="hidden" class="prod_id" value="{{$item->product_id}}">
                            @if($item->products->quantity >= $item->product_quantity)
                                
                                <label for="Quantity">Số lượng</label>
                                <div class="input-group text-center mb-3" style="width:130px;">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity" class="form-control qty-input text-center" value="1">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            @else
                                <h6>Hết hàng</h6>
                            @endif
                        </div>
                        <div class="col-md-2 my-auto">
                            <button type="button" class="btn btn-success addToCartBtn">Thêm vào giỏ hàng <i class="bi bi-cart"></i></button>
                        </div>
                        <div class="col-md-2 my-auto">
                            <button type="button" class="btn btn-danger removewishlistitem">Xóa sản phẩm <i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                @endforeach
            @else
                <h4 style="text-align: center;padding-top:10px;padding-bottom:auto">Không có sản phẩm nào trong Danh sách yêu thích của bạn <i class="bi bi-emoji-frown-fill"></i></h4><br/><br/><br/>
                <a href="{{url('allcategories')}}" class="btn btn-outline-success float-end" style="text-decoration: none;">Đi mua sắm</a>
            @endif
        </div>
    </div>
</div>
@endsection