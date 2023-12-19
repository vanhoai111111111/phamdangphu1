<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPhu Store</title>
    <style>
        body{
            background-color: #F6F6F6; 
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color: red;
           padding: 10px 40px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-black">PPHU Store</h1>
                </div>
                <div class="col-6">
                    <div class="company-details">
                        <h3 class="text-black">CẢM ƠN!</h3>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <h2 class="heading">Hóa đơn số: {{$orders->id}}</h2>
                    <p class="sub-heading">Ngày đặt hàng: {{date('d-m-Y',strtotime($orders->created_at))}} </p>
                    <p class="sub-heading">Địa chỉ Email: {{$orders->email}} </p>
                </div>
                <div class="col-6">
                    <p class="sub-heading">Họ và tên: {{$orders->fname}} {{$orders->lname}}</p>
                    <p class="sub-heading">Địa chỉ: {{$orders->address}} </p>
                    <p class="sub-heading">Số điện thoại: {{$orders->phone}} </p>
                    <p class="sub-heading">Thành phố: {{$orders->city}} </p>
                </div>
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading">Các mặt hàng đã đặt hàng</h3>
            <br>
            <div class="col-md-6">
                <table class="table table-bordered">
                  <thead>
                  <tr>
                      <th>Mã đơn hàng</th>
                      <th>Tên</th>
                      <th>Số lượng</th>
                      <th>Giá</th>
                      <th>Màu</th>
                      <th>Hình ảnh</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach($orders->orderitems as $item)
                          <tr>
                              <td>{{$item->id}}</td>
                              <td>{{$item->products->brand_name}} {{$item->products->model_name}}</td>
                              <td>{{$item->quantity}}</td>
                              <td>{{$item->price}}.VNĐ</td>
                              <td>{{$orders->color}}</td>
                              <td><img src="{{asset('assets/uploads/product/'.$item->products->image)}}" width="50px" alt="Image is here"></td>
                          </tr>

                      @endforeach
                  </tbody>
                </table><br/><br/>
                <h3 class="px-2"><b>Tổng cộng :  {{$orders->total_price}}.VNĐ</b></h3>
                </div>
            <br>
            @if($orders->payment_mode=='Online Payment')
                <h3 class="heading">Payment ID: {{$orders->payment_id}}</h3>
            @endif
            <h3 class="heading">Trạng thái thanh toán: 
                @if($orders->payment_mode=='Online Payment')
                    Paid
                @else 
                    Chưa thanh toán
                @endif
                   
            </h3>
            <h3 class="heading">Phương thức thanh toán: {{$orders->payment_mode}}</h3>
        </div>

        <div class="body-section">
            <p>&copy; PPHU Store 
                <a href="" class="float-right">www.PPHU Store.com</a>
            </p>
        </div>      
    </div>      

</body>
</html>