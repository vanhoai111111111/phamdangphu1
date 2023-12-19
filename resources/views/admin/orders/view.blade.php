@extends('layouts.admin')

@section('title')
Order Details

@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Xem đơn hàng
                        <a href="{{url('/orders')}}" class="btn btn-warning text-black float-end">Trở về</a>
                    </h4>
                </div>
                <div class="card-body">
                  <div class="row">
                      <div class="col-md-6 order-details">
                        <label for="">Mã đơn hàng</label>
                        <div class="border p-2">{{$orders->id}}</div>
                        <label for="">Tên</label>
                        <div class="border p-2">{{$orders->fname}}</div>
                        <label for="">Họ</label>
                        <div class="border p-2">{{$orders->lname}}</div>
                        <label for="">Email</label>
                        <div class="border p-2">{{$orders->email}}</div>
                        <label for="">Liên hệ</label>
                        <div class="border p-2">{{$orders->phone}}</div>
                        <label for="">Địa chỉ</label>
                        <div class="border p-2">{{$orders->address}},{{$orders->city}}</div>
                        

                      </div>
                      
                      <div class="col-md-6">
                      <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Màu Sắc</th>
                            <th>Hình ảnh</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($orders->orderitems as $item)
                                <tr>
                                    <td>{{$item->products->brand_name}} {{$item->products->model_name}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->price}}.VNĐ</td>
                                    <td>{{$orders->color}}</td>
                                    <td><img src="{{asset('assets/uploads/product/'.$item->products->image)}}" width="50px" alt="Image is here"></td>
                                </tr>

                            @endforeach
                        </tbody>
                      </table>
                      <h4 class="px-2">Tổng Cộng : {{$orders->total_price}}.VNĐ</h4>
                      <h5 class="px-2">Phương thức thanh toán : {{$orders->payment_mode}}</h5>
                      <div class="mt-5">
                          <label for="">Tình trạng đặt hàng</label>
                          <form action="{{url('update-order/'.$orders->id)}}" method="POST">
                              @csrf
                              @method('PUT')
                              <select class="form-select" name="order_status">
                                  <option {{$orders->status=='0'?'selected':''}} value="0">Chưa giải quyết</option>
                                  <option {{$orders->status=='1'?'selected':''}} value="1">Hoàn thành</option>
                              </select>
                              <button type="submit" class="btn btn-primary mt-3 float-end">CẬP NHẬT</button>
                          </form>
                      </div>
                      </div>
                  </div>
                  
              </div>
            </div>
        </div>
    </div>
</div>
@endsection