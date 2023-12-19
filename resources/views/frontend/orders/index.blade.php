@extends('layouts.front')

@section('title')
My Orders

@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-warning">
                    <h4 class="text-black">Xem đơn hàng
                        
                    </h4>
                </div>
                <div class="card-body">
                  <table class="table table-bordered">
                  <thead>
                    <tr>
                       
                        <th>Mã đơn hàng</th>
                        <th>Trạng thái</th>
                        <th>Hoạt động</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $item)
                    <tr>
                        
                        <td>{{$item->id}}</td>
                        <td>{{$item->status=='0'?'Chưa giải quyết':'Đơn đặt hàng của bạn đang được chuyển đi. Bạn có thể sớm nhận được đơn đặt hàng của mình.'}}</td>
                        <td><a href="{{url('/view-order/'.$item->id)}}" class="btn btn-danger">Xem chi tiết đơn hàng</a>
                            <a href="{{url('invoice/'.$item->id)}}" class="btn btn-success float-end">Tạo hóa đơn</a></td>
                    </tr>

                    @endforeach
                </tbody>
              </table>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection