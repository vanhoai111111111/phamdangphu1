@extends('layouts.admin')
@section('title')
   Category View

@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Trang danh mục</h4>
            <hr/>
        </div>   
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Mã</th>
                        <th>Tên</th>
                        <th>Miêu tả</th>
                        <th>Hình ảnh</th>
                        <th>Trạng thái</th>
                        <th>Hoạt động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category as $item)
                       <tr>
                           <td>{{$item->id}} </td>
                           <td>{{$item->name}}</td>
                           <td>{{$item->description}}</td>
                           <td>
                               <img src="{{ asset('assets/uploads/category/'.$item->image) }}" class="category-image" alt="Image is here">
                           </td>
                           <td>{{$item->status}}</td>
                           <td>
                               <a href="{{ url('edit-product'.$item->id)}}" class="btn btn-primary">Sửa</a>
                               <a href="{{ url('delete-category'.$item->id)}}" class="btn btn-danger">Xóa</button>
                           </td>
                       </tr>
                       @endforeach
                </tbody>
            </table>
        </div>       
    </div> 
       
@endsection