@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
        <h2>Bán hàng hôm nay - {{$date}}</h2></br>
        <table class="table">
                <thead style="background-color: #565353">
                  <tr>
                    
                    <th  style="text-align: center; color:white;">Mã sản phẩm</th>
                    <th  style="text-align: center; color:white;">Tên sản phẩm</th>
                    <th  style="text-align: center; color:white;">SL máy</th>
                    <th  style="text-align: center; color:white;">Tổng Giá</th>
                    <th  style="text-align: center; color:white;">Thời Gian</th>
                  </tr>
                </thead>
                @php $total=0; @endphp
                <tbody>
                  @foreach($product as $pr)
                  <tr>
                  
                   <td style="text-align: center; color:black;"> 
                    {{$pr->product_id}}
                   </td>
                   
                  <td style="text-align: center; color:black;">
                    {{$pr->products->brand_name}} {{$pr->products->model_name}}
                  </td>

                  <td style="text-align: center; color:black;"> 
                    {{$pr->quantity}}
                   </td>

                   <td style="text-align: center; color:black;"> 
                    {{$pr->price}}
                   </td>

                   <td style="text-align: center; color:black;">
                    {{date('H:i:s',strtotime($pr->created_at))}}
                   </td>
                  </tr>
                  @php
                    
                    $total=$total+$pr->price;
                  @endphp
                  @endforeach
                </tbody>
              </table>
             </br><h3 style="color:red">Tổng thu nhập hôm nay: {{$total}}.VNĐ</h3><br/><br/><hr>





             <h2>Đơn hàng theo tháng</h2></br>
             <table class="table">
                     <thead style="background-color: #565353">
                       <tr>
                         
                         <th  style="text-align: center; color:white;">Số Lượng Sản Phẩm Đã Bán</th>
                         <th  style="text-align: center; color:white;">Tổng Thu Nhập</th>
                         <th  style="text-align: center; color:white;">Tháng</th>
                       </tr>
                     </thead>
                     @php $total=0; @endphp
                     
                     <tbody>
                    
                       @php $tot=0;$total=0; @endphp
                       @foreach($month as $quanty)
                          @php $tot=$tot+$quanty->quantity @endphp
                       @endforeach

                       @foreach($month as $price)
                          @php $total=$total+$price->price @endphp
                       @endforeach
                       <tr>
                       
                        <td style="text-align: center; color:black;"> 
                          {{$tot}}
                          
                        </td>
                        
                        <td style="text-align: center; color:black;">
                          {{$total}}
                        </td>

                        <td style="text-align: center; color:black;">
                          {{$monthName}}
                        </td>
     
                       
     
                        
                       </tr>
                       @php
                         
                         
                       @endphp
                       
                     </tbody>
                   </table>
                  </br><h3 style="color:red">Tổng thu nhập trong tháng: {{$total}}.VNĐ</h3>

           
              
        </div>          
    </div>   
    
    
@endsection