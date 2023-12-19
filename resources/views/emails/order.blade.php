<html>
    <head><title>Order</title></head>
<body>
@if($mode == 'Online Payment')
    <h2>Order Placed and Payment Successfully.We are processing your order.You will recive your Valuable Order Soon.Thank You for Dealing with Us!</h2><br/>
@else
    <h2>Đơn đặt hàng của bạn đã được đặt thành công. Chúng tôi đang xử lý đơn đặt hàng của bạn. Bạn sẽ sớm nhận được Đơn đặt hàng có giá trị của mình. Cảm ơn bạn đã giao dịch với chúng tôi!</h2><br/>
@endif
<h2><b>Chi tiết đặt hàng</b></h2>
<table>
<tr><td><h4><b>Mã đơn hàng</b></h4></td><td> - </td><td><h4>{{$order_id}}</h4></td></tr>
@if($mode == 'Online Payment')
   <tr><td><h4><b>Payment_ID</b></h4></td><td> - </td><td><h4>{{$id}}</h4></td></tr>

@endif
<tr><td><h4><b>Phương thức thanh toán</b></h4></td><td> - </td><td><h4>{{$mode}}</h4></td></tr>
<tr><td><h4><b>Tổng giá</b></h4></td><td> - </td><td><h4>{{$tot}}.VNĐ</h4></td></tr>

</table>

<h2><b>Chi tiết khách hàng</b></h2>
<table>
<tr><td><h4><b>Tên</b></h4></td><td> - </td><td><h4>{{$fname}}</h4></td></tr>
<tr><td><h4><b>Họ</b></h4></td><td> - </td><td><h4>{{$lname}}</h4></td></tr>
<tr><td><h4><b>Địa chỉ</b></h4></td><td> - </td><td><h4>{{$address}}</h4></td></tr>
<tr><td><h4><b>Thành phố</b></h4></td><td> - </td><td><h4>{{$city}}</h4></td></tr>
<tr><td><h4><b>Email</b></h4></td><td> - </td><td><h4>{{$email}}</h4></td></tr>
<tr><td><h4><b>Số điện thoại</b></h4></td><td> - </td><td><h4>{{$phone}}</h4></td></tr>
</table>


<footer><h4 style="color: red">-PPhu Store-</h4></footer>

            
</body></html>
