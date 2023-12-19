@extends('layouts.front')
<link rel="stylesheet" href="{{ asset('frontend/css/card.css') }}">
@section('title')
    

@endsection

@section('content')

    @include('layouts.inc.slider')
    <div class="py-5">
        <div class="container">
            <div class="row">
              <h1 style="text-align: center">Sản phẩm hot</h1><hr/><br/><br/>
              <div class="row row-cols-1 row-cols-md-2 g-4 mt-0">
              @foreach($product_details as $products)
               @if($products->trending==1)
               
                <div class="col-md-3 mb-0">
                    
                    <div class="card h-70 container-fluid bg-trasparent my-4 p-3 shadow-sm">
                        <div class="card-header">
                            @if($products->quantity>0)
                               <div class="badge bg-success col-12">Trong kho</div>
                            @else
                               <span class="badge bg-danger col-12">Hết hàng</span>
                            @endif
                          </div>
                        <img src="{{asset('assets/uploads/product/'.$products->image)}}" height="200px" alt="Product image">
                        <div class="card-body">
                            <div class="clearfix mb-3">
                                <h6 class="text-center"><b>{{$products->brand_name}} {{$products->model_name}}</b></h6> 
                                <p style="font-size: 12px;text-align:center">ID Sản phẩm - {{$products->id}}</p>
                                
                                @if($products->offer==1)
                                   <span class="badge bg-danger"><h6 style="align-items: center">GIÁ ĐẶC BIỆT - {{$products->selling_price}}.VNĐ</h6></span>
                               @else
                                   <h6 class="text-center text-danger">{{$products->selling_price}}.VNĐ</h6>
                               @endif
                                <div class="text-center my-3"> <a href="{{url('category/'.$category_details->name.'/'.$products->model_name)}}" class="btn btn-warning">Xem thêm & Mua</a> </div>
                            </div>
                        </div>
                    </div>
                </div>
               
                @endif
                @endforeach
              </div>
            </div>
        </div>
    </div>

@endsection