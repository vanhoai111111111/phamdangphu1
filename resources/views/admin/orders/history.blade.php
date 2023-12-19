@extends('layouts.admin')
@section('title')
    Order History
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <form action="order-history" method="GET">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col">
                          
                            
                          <div class="col-md-3 mb-0">
                            <h6>Lọc đơn hàng</h6>
                            <select class="form-select" name="id" id="brand">
                              <option value="all">Mã đơn hàng</option>
                              
                              @foreach($orders as $order)
                              @if($order->status==1)
                              <option value="{{$order->id}}">{{$order->id}}</option>
                              @endif
                              @endforeach
                                
                              
                            </select><br/>
                            <button class="btn btn-outline-dark" type="submit">Tìm kiếm</button>
                          </div>
                        </div>
                    </div></div>
                    
            </form>

                <div class="card-header bg-primary">
                    <h4 class="text-white">Lịch sử đơn hàng
                        <a href="{{'orders'}}" class="btn btn-warning float-end">Đơn hàng mới</a>
                    </h4>
                    
                </div>
                <div class="card-body">
                  <table class="table table-bordered">
                  <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Ngày đặt hàng</th>
                        <th>Tổng giá</th>
                        <th>Trạng thái</th>
                        <th>Hoạt động</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{date('d-m-Y',strtotime($item->created_at))}}</td>
                        <td>{{$item->total_price}}</td>
                        <td>{{$item->status=='0'?'Chưa giải quyết':'Hoàn thành'}}</td>
                        <td><a href="{{url('admin/view-order/'.$item->id)}}" class="btn btn-primary">Xem</a></td>
                    </tr>

                    @endforeach
                </tbody>
              </table>
              </div>
            </div>
    </div>
</div>

@endsection