@extends('layouts.front')


@section('title')
    Checkout

@endsection

@section('content')

<div class="py-3 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Thủ tục thanh toán</h6>
    </div>
</div>
<div class="container mt-3 d-flex flex-column align-items-end">
    
    <form action="{{url('/place-order')}}" method="POST">
        {{csrf_field()}}
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body shadow-sm">
                    <h6>Chi tiết cơ bản</h6>
                    <hr/>
                    <div class="row checkout-form">
                        <div class="col-md-6">
                            <label for="">Tên </label>
                            <input type="text" class="form-control firstname" value="{{Auth::user()->name}}" name="fname" placeholder="Enter First Name" required>
                            <span id="fname_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="">Họ </label>
                            <input type="text" class="form-control lastname" value="{{Auth::user()->lname}}" name="lname" placeholder="Enter Last Name" required>
                            <span id="lname_error"  class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Email</label>
                            <input type="text" class="form-control email" value="{{Auth::user()->email}}" name="email" placeholder="Enter Email" required>
                            <span id="email_error"  class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Số điện thoại</label>
                            <input type="text" class="form-control phone" value="{{Auth::user()->phone}}" name="phone" placeholder="Enter Phone Number" required>
                            <span id="phone_error"  class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Địa chỉ</label>
                            <input type="text" class="form-control address" value="{{Auth::user()->address}}" name="address" placeholder="Enter Address 1" required>
                            <span id="address_error"  class="text-danger"></span>
                        </div>
                    
                        <div class="col-md-6 mt-3">
                            <label for="">Thành phố</label>
                            <input type="text" class="form-control city" value="{{Auth::user()->city}}" name="city" placeholder="Enter City" required>
                            <span id="city_error"  class="text-danger"></span>
                        </div>
                        
                        
                        
                    </div>
                </div>
            </div><br/>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body shadow-sm">
                    <h6>Chi tiết đặt hàng</h6>
                    <hr/>
                    <table class="table table-striped border">
                        <thead>
                        <tr>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>*Màu sắc*<br/>(Chọn màu có sẵn) </th>
                        </tr>
                        </thead>
                        @php $total=0 @endphp
                        <tbody>
                            @foreach($cartitems as $item)
                            
                            <tr>
                                <td>{{$item->products->brand_name}} {{$item->products->model_name}}</td>
                                <td>{{$item->product_quantity}}</td>
                                <td>{{$item->products->selling_price}}.VNĐ</td>
                                <td><select class="form-select" name="color">
                        
                        
                                    <option value="">Chọn một màu</option>
                                    <option value="Blue">Màu xanh da trời</option>
                                    <option value="Black">Đen</option>
                                    <option value="Gray">Xám</option>
                                    <option value="Gold">Vàng</option>
                                    <option value="White">Trắng</option>
                                 
                               
                           </select></td>
                            </tr>
                            
                            
                            @php 
                            
                            $total+=$item->products->selling_price*$item->product_quantity; @endphp
                            @endforeach
                        </tbody>
                    </table>
                    <h5><b>Tổng cộng  : {{$total}}.VNĐ</b></h5>
                    
                    <hr/>
                    <input type="hidden" name="payment_mode" value="Thanh toán khi giao hàng">
                    <button type="submit" class="btn btn-success float-end w-100">Đặt hàng và nhận tiền mặt khi giao hàng</button><br><br/>
                    
                    <!-- <input type="hidden" name="createPayment" value="Thanh toán online">
                    <button type="button" class="btn btn-primary w-100" id="btnPopup">Thanh toán online</button> -->
                    <!-- <button type="button" class="btn btn-danger pay_btn w-100">Online Pay</button><br><br/> -->
                    <!-- <form action="{{url('/vnp')}}" method="POST">
	                @csrf
                    <button type="submit" class="btn btn-danger w-100 check_out" name="redirect">Thanh toán VNPAY</button>
                    <div class="payment_box payment_method_vnpay"style="display: none;"> Pay via VnPay; you can pay with your </div> 
                    </form> -->
                    
                </div>
            </div>
        </div>
    </div>
    </form>
    <form action="{{url('/vnp')}}" method="POST" class="mb-4">
    {{csrf_field()}}
                        <input type="hidden" name="money" value="{{$total}}">
                        <input type="hidden" name="payment_mode" value="Thanh toán online">
                       
                        <button style="width: 525px" type="submit" class="btn btn-danger check_out" name="redirect">Thanh toán VNPAY</button>
                        <div class="payment_box payment_method_vnpay"style="display: none;"> Pay via VnPay; you can pay with your </div> 
                    </form>
                    
</div>

@endsection

@section('scripts')
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    
@endsection

