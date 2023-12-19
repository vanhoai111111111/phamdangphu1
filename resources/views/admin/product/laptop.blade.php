@extends('layouts.admin')
@section('title')
   Laptop

@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Trang chi tiết Laptops</h4>
            
            <form action="laptops" method="GET">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col">
                          
                            
                          <div class="col-md-3 mb-0">
                            
                            <select class="form-select" name="id" id="brand">
                              <option value="all">ID sản phẩm</option>
                              
                              @foreach($laptop as $lpid)
                              @if($lpid->category_id==1)
                              <option value="{{$lpid->id}}">{{$lpid->id}}</option>
                              @endif
                              @endforeach
                                
                              
                            </select><br/>
                            <button class="btn btn-outline-dark" type="submit">Tìm kiếm</button>
                          </div>
                        </div>
                    </div></div>
                    
            </form>
           
            <hr/>
        </div>   
        <div class="card-body mb-0">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Mã sản phẩm</th>
                        <th>Tên thương hiệu</th>
                        <th>Tên Mẫu</th>
                        <th>Hình Ảnh</th>
                        <th>Giá Gốc</th>
                        <th>Giá Bán</th>
                        <th>Số Lượng</th>
                       
                        <th>Hoạt Động</th>
                    </tr>
                </thead>
                <tbody>
                    @php $x=0; @endphp
                    @foreach($laptop as $item)
                     @if($item->category_id==1)
                       @php $x++;@endphp 
                       <tr>
                           <td>{{$x}}</td>
                           <td>{{$item->id}} </td>
                           <td>{{$item->brand_name}}</td>
                           <td>{{$item->model_name}}</td>
                           <td>
                               <img src="{{ asset('assets/uploads/product/'.$item->image) }}" class="product-image" alt="Image is here">
                           </td>
                           <td>{{$item->original_price}}</td>
                           <td>{{$item->selling_price}}</td>
                           <td>{{$item->quantity}}</td>
                           
                           <td>
                                
                               <a href="{{ url('edit-prod/'.$item->id)}}" class="btn btn-primary">Sửa</a>
                               <a href="{{ url('delete-product'.$item->id)}}" class="btn btn-danger">Xóa</button>
                           </td>
                       </tr>
                       @endif
                    @endforeach
                </tbody>
            </table>
        </div>       
    </div> 
       
@endsection