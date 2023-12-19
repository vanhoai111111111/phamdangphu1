@extends('layouts.admin')
@section('title')
   Edit Product

@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Chỉnh sửa sản phẩm</h4>
        </div>
        <div class="card-body">
            <form action="{{url ('update-product',$product?->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-3 mb-3">
                <label for="">Chọn một danh mục</label>
                    <select class="form-select" name="category_id">
                        
                        
                         
                             <option value="">{{$product?->category?->name}}</option>
                          
                        
                    </select>
                     
                </div>

                

                <div class="col-md-3 mb-3">
                    <label for="">Tên thương hiệu</label>
                    <select class="form-select" name="brand_name">
                        <option value="">{{$product?->brand_name}}</option>
                        <option value="Asus" {{$product->brand_name == 'Asus' ? 'selected':''}}>Asus</option>
                        <option value="Acer" {{$product->brand_name == 'Acer' ? 'selected':''}}>Acer</option>
                        <option value="Apple" {{$product->brand_name == 'Apple' ? 'selected':''}}>Apple</option>
                        <!-- <option value="Canon" {{$product->brand_name == 'Canon' ? 'selected':''}}>Canon</option> -->
                        <option value="Dell" {{$product->brand_name == 'Dell' ? 'selected':''}}>Dell</option>
                        <!-- <option value="Epson" {{$product->brand_name == 'Epson' ? 'selected':''}}>Epson</option> -->
                        <option value="HP" {{$product->brand_name == 'HP' ? 'selected':''}}>HP</option>
                        <option value="Lenovo" {{$product->brand_name == 'Lenovo' ? 'selected':''}}>Lenovo</option>
                        <option value="MSI" {{$product->brand_name == 'MSI' ? 'selected':''}}>MSI</option>
                        <!-- <option value="Samsung" {{$product->brand_name == 'Samsung' ? 'selected':''}}>Samsung</option> -->
                    </select>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Tên mẫu</label>
                    <input type="text" value="{{$product?->model_name}}" class="form-control" name="model_name">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Miêu tả</label>
                    <textarea name="description" rows="3" class="form-control">{{$product?->description}}</textarea>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="">Giá gốc</label>
                    <input type="number" value="{{$product?->original_price}}" name="original_price">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Ưu đãi đặt biệt</label>
                    <input type="checkbox" {{$product?->offer=="1"? 'checked':''}} name="offer">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Giá bán</label>
                    <input type="number" value="{{$product?->selling_price}}" name="selling_price">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Số lượng</label>
                    <input type="number" value="{{$product?->quantity}}" name="quantity">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Xu hướng</label>
                    <input type="checkbox" {{$product?->trending=="1"? 'checked':''}} name="trending">
                </div>
                
                <h5>Dành cho Laptops/Desktops</h5>
                
                <div class="col-md-2 mb-3">
                    <label for="">Ram</label>
                    <select class="form-select" name="ram">
                        <option value="">{{$product?->ram}}</option>
                        <option value="2GB" {{$product->ram == '2GB' ? 'selected':''}}>2GB</option>
                        <option value="4GB" {{$product->ram == '4GB' ? 'selected':''}}>4GB</option>
                        <option value="8GB" {{$product->ram == '8GB' ? 'selected':''}}>8GB</option>
                        <option value="16GB" {{$product->ram == '16GB' ? 'selected':''}}>16GB</option>
                        <option value="32GB" {{$product->ram == '32GB' ? 'selected':''}}>32GB</option>
                    </select>

                </div>

                <div class="col-md-2 mb-3">
                    <label for="">Bộ xử lý</label>
                    <select class="form-select" name="processor">
                        <option value="">{{$product?->processor}}</option>
                        <option value="Intel core i3" {{$product->processor == 'Intel core i3' ? 'selected':''}}>Intel core i3</option>
                        <option value="Intel core i5" {{$product->processor == 'Intel core i5' ? 'selected':''}}>Intel core i5</option>
                        <option value="Intel core i7" {{$product->processor == 'Intel core i7' ? 'selected':''}}>Intel core i7</option>
                        <option value="Intel core i9" {{$product->processor == 'Intel core i9' ? 'selected':''}}>Intel core i9</option>
                        <option value="AMD Ryzen 3" {{$product->processor == 'AMD Ryzen 3' ? 'selected':''}}>AMD Ryzen 3</option>
                        <option value="AMD Ryzen 5" {{$product->processor == 'AMD Ryzen 5' ? 'selected':''}}>AMD Ryzen 5</option>
                        <option value="AMD Ryzen 7" {{$product->processor == 'AMD Ryzen 7' ? 'selected':''}}>AMD Ryzen 7</option>
                        <option value="AMD Ryzen 9" {{$product->processor == 'AMD Ryzen 9' ? 'selected':''}}>AMD Ryzen 9</option>
                        <option value="Apple M1" {{$product->processor == 'Apple M1' ? 'selected':''}}>Apple M1</option>
                        <option value="Apple M2" {{$product->processor == 'Apple M2' ? 'selected':''}}>Apple M2</option>
                    </select>

                </div>

                <div class="col-md-3 mb-3">
                    <label for="">Ổ cứng</label>
                    <select class="form-select"  name="storage">
                        <option value="">{{$product?->storage}}</option>
                        <option value="1TB SSD" {{$product->storage == '1TB SSD' ? 'selected':''}}>1TB SSD</option>
                        <option value="512GBSSD" {{$product->storage == '512GB SSD' ? 'selected':''}}>512GB SSD</option>
                        <option value="512GBSSD" {{$product->storage == '256GB SSD' ? 'selected':''}}>256GB SSD</option>
                        <option value="1TB HDD+128GB SSD" {{$product->storage == '1TB HDD+128GB SSD' ? 'selected':''}}>1TB HDD+128GB SSD</option>
                        <option value="1TB HDD" {{$product->storage == '1TB HDD' ? 'selected':''}}>1TB HDD</option>
                        
                    </select>

                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Loại(Chơi game)</label>
                    <input type="checkbox" {{$product?->type=="1"? 'checked':''}} name="type">
                </div>
              
                <div class="col-md-12 mb-3">
                    <label for="">Cổng</label>
                    <input type="text" value="{{$product?->ports}}" class="form-control" name="ports">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Đồ họa</label>
                    <input type="text" value="{{$product?->graphic}}" class="form-control" name="graphic">
                </div>
                
                <div class="col-md-12 mb-3">
                    <label for="">Màn hình</label>
                    <input type="text" value="{{$product?->display}}" class="form-control" name="display">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Màu sắc</label>
                    <input type="text" value="{{$product?->color}}" class="form-control" name="color">
                </div>
                
                <div class="col-md-12 mb-3">
                    <label for="">Bộ vi xử lý</label>
                    <input type="text" value="{{$product?->chipset}}" class="form-control" name="chipset">
                </div>
                
                <div class="col-md-12 mb-3">
                    <label for="">Khe cắm bộ nhớ</label>
                    <input type="text" value="{{$product?->memory_slots}}" class="form-control" name="memory_slots">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Hệ điều hành</label>
                    <input type="text" value="{{$product?->operating_system}}" class="form-control" name="operating_system">
                </div>
                
                <div class="col-md-12 mb-3">
                    <label for="">Thông tin khác</label>
                    <textarea name="other_info" rows="3" class="form-control">{{$product?->other_info}}</textarea>
                </div>

                @if($product?->image)
                      <img src="{{asset('assets/uploads/product/'.$product?->image)}}" alt="Product image">
                @endif

                <div class="col-md-12">
                    <input type="file" value="{{$product?->quantity}}" name="image" class="form-control">
                    
                </div>
   
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Nộp</button>
                </div>

                
            </div>
            </form>
        </div>
    </div>    
@endsection